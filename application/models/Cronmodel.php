<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cronmodel extends CI_Model {

    protected $rede_total = array();
    protected $todos_niveis = array();

    public function __construct() {
        parent::__construct();    
    }

    public function getPrevKey($key, $hash = array()) {
        $keys = array_keys($hash);
        $found_index = array_search($key, $keys);
        if ($found_index === false || $found_index === 0)
            return false;
        return $keys[$found_index - 1];
    }

    public function VerificaQualificadorRede($id_usuario, $qualificador_quantidade, $qualificador_plano) {

        $quantidade = 0;

        $this->db->where('id_patrocinador', $id_usuario);
        $this->db->where('plano_ativo', 1);
        $rede = $this->db->get('rede');

        if ($rede->num_rows() > 0) {

            foreach ($rede->result() as $resultRede) {

                $this->db->where('id_usuario', $resultRede->id_usuario);
                $this->db->where('id_plano_carreira', $qualificador_plano);
                $planos_carreira_ganhos = $this->db->get('usuarios_plano_carreira');

                if ($planos_carreira_ganhos->num_rows() > 0) {

                    $quantidade++;
                }
            }

            if ($quantidade >= $qualificador_quantidade) {

                return true;
            } else {

                foreach ($rede->result() as $resultRede) {

                    $retorno = $this->VerificaQualificadorRede($resultRede->id_usuario, $qualificador_quantidade, $qualificador_plano);

                    if ($retorno) {

                        return true;
                    }
                }
            }
        }

        return false;
    }

    public function planosExpirados() {
        $this->db->where('status', 1);
        $faturas = $this->db->get('faturas');

        if ($faturas->num_rows() > 0) {

            foreach ($faturas->result() as $fatura) {
                $expira = date('Y-m-d', strtotime("+{$fatura->quantidade_dias} days", strtotime($fatura->data_pagamento)));

                if (strtotime(date('Y-m-d')) >= strtotime($expira)) {

                    $this->db->where('id', $fatura->id);
                    $this->db->update('faturas', array('status' => 2));

                    EnviaNotificacao($fatura->id_usuario, 'Seu plano expirou, para continuar ganhando, compre outro agora.');
                }
            }
        }
    }


    public function CriaTodosNiveis2() {

        $this->db->order_by('nivel', 'ASC');
        $niveis = $this->db->get('configuracao_nivel_indicacoes');
    
        if ($niveis->num_rows() > 0) {
    
            foreach ($niveis->result() as $nivel) {
    
                $this->todos_niveis[$nivel->nivel] = $nivel->porcentagem;
            }
        }
    }

    public function LinhaIndicacao2($id, $niveis, $bonus = false) {
        echo 'Entrou aqui';
        if ($niveis > 0) {
    
            $this->db->where('id_usuario', $id);
            $patrocinadores = $this->db->get('rede');
    
            if ($patrocinadores->num_rows() > 0) {
    
                $row = $patrocinadores->row();
    
                if (!$bonus) {
                    $id = $row->id_patrocinador_direto;
                } else {
                    $id = $row->id_patrocinador_direto;
                }
    
                $this->rede_total[] = $id;
    
                $this->LinhaIndicacao2($id, $niveis - 1, $bonus);
            }
        }
    }


    public function PagaBonificacao() {
        
        $this->db->where('status', 1);
        $faturas = $this->db->get('faturas');

        if ($faturas->num_rows() > 0) {

            foreach ($faturas->result() as $fatura) {

                $this->db->select('chave_teto');
                $this->db->where('id', $fatura->id_usuario);
                $usuario = $this->db->get('usuarios')->row();

                if ($fatura->data_pagamento != date("Y-m-d")){
                    
                    $pagamento = ($fatura->porcentagem_dia / 100) * $fatura->valor;
                    if ($usuario->chave_teto != '1' && $fatura->porcentagem_dia != '0.00'){
                        AtualizarLucro($fatura->id_usuario, $usuario->chave_teto, $fatura->id, $pagamento);

                        
                        $this->db->where('id_usuario', $fatura->id_usuario);
                        $redeAfiliado = $this->db->get('rede');

                        if ($redeAfiliado->num_rows() > 0) {
                            $rowAfiliado = $redeAfiliado->row();
            
                            $this->rede_total = array();
                            $this->LinhaIndicacao2($fatura->id_usuario, 10, true);
                            $this->CriaTodosNiveis2();
            
                            if (!empty($this->rede_total)) {
                                foreach ($this->rede_total as $nivel => $patrocinador) {
                                    
                                    if (PlanoAtivo($patrocinador)) {
            
                                        if (isset($this->todos_niveis[$nivel + 1])) {
            
                                            $this->db->select_sum('teto');
                                            $this->db->where('id_usuario', $patrocinador);
                                            $this->db->where('status', 1);
                                            $SumTeto = $this->db->get('faturas')->row();
            
                                            if ((InformacoesUsuario('saldo', $patrocinador) + InformacoesUsuario('saldo_rede', $patrocinador)) >= $SumTeto->teto) {
            
                                                $this->db->where('id', $patrocinador);
                                                if (InformacoesUsuario('chave_teto', $patrocinador) == '0') {
                                                    EnviaNotificacao($patrocinador, 'Teto máximo atingido. Sua conta está pausada, até o teto ser liberado ou aumentado.', 0);
                                                }
                                                $this->db->update('usuarios', array('chave_teto' => '1'));
            
                                            }
            
                                            if (InformacoesUsuario('chave_teto', $patrocinador) != '1') {
            
                                                $bonusResidual = ($this->todos_niveis[$nivel + 1] / 100) * $pagamento;
                                                // ATUALIZAR SALDO DO USUARIO 
                                                $novo_saldo = InformacoesUsuario('saldo_residual', $patrocinador) + $bonusResidual;
                                                $this->db->where('id', $patrocinador);
                                                $this->db->update('usuarios', array('saldo_residual' => $novo_saldo));
                                                GravaExtrato($patrocinador, $fatura->id_usuario, $bonusResidual, 'Bônus Residual <- ' . InformacoesUsuario('login', $fatura->id_usuario), 1);
                                            
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function RegrasDoPlano($id_usuario, $id_plano) {
        $this->db->where('id', $id_plano);
        $plano = $this->db->get('plano_carreira');

        if ($plano->num_rows() > 0) {
            $planoRow = $plano->row();

            $this->db->where('id_patrocinador_direto', $id_usuario);
            $this->db->where('plano_ativo', 1);
            $IndicadosAtivos = $this->db->get('rede');

            if ($planoRow->quantidade_ativos > 0) {

                if ($IndicadosAtivos->num_rows() >= $planoRow->quantidade_ativos) {
                    if ($planoRow->faturas > 0) {

                        $this->db->select_sum('valor');
                        $this->db->where('id_usuario', $id_usuario);
                        $this->db->where('status', 1);
                        $TotalFaturas = $this->db->get('faturas')->row();

                        if ($TotalFaturas->valor >= $planoRow->faturas) {

                            if ($planoRow->qualificacao_indicados > 0 && $planoRow->qualificacao_indicados_qnt > 0) {

                                $this->db->select('r.id');
                                $this->db->from('rede AS r');
                                $this->db->join('usuarios AS u', 'r.id_usuario = u.id', 'inner');
                                $this->db->where('r.id_patrocinador_direto', $id_usuario);
                                $this->db->where('r.plano_ativo', 1);
                                $this->db->where('u.plano_carreira', $planoRow->qualificacao_indicados);

                                $indicadosQualificados = $this->db->get();

                                if ($indicadosQualificados->num_rows() >= $planoRow->qualificacao_indicados_qnt) {
                                    return true;
                                }
                            } else {
                                return true;
                            }
                        }
                    } else {
                        return true;
                    }
                }
            } else {
                return true;
            }
        }

        return false;
    }

    public function GanhoPlanoCarreira() {
        $quantidadePontos = array();
        $administradores = array();
        $UsuariosLados = array();

        $this->db->order_by('pontos', 'ASC');
        $planos = $this->db->get('plano_carreira');

        if ($planos->num_rows() > 0) {

            foreach ($planos->result() as $plano) {

                $quantidadePontos[$plano->id] = array('pontos' => $plano->pontos, 'plano' => $plano->nome);
            }
        }

        $this->db->where('is_admin', 1);
        $usuariosAdministradores = $this->db->get('usuarios');

        if ($usuariosAdministradores->num_rows() > 0) {

            foreach ($usuariosAdministradores->result() as $resultAdministradores) {

                $administradores[] = $resultAdministradores->id;
            }
        }

        $pontos = $this->db->query("SELECT SUM(pontos) as pontos, id_usuario FROM rede_pontos_binario GROUP BY id_usuario");

        if ($pontos->num_rows() > 0) {

            foreach ($pontos->result() as $ponto) {

                $anterior = 0;

                if (!isset($UsuariosLados[$ponto->id_usuario])) {

                    $PontosLadoEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '" . $ponto->id_usuario . "' AND chave_binaria = '1' AND pago = '0'");
                    $PontosLadoDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '" . $ponto->id_usuario . "' AND chave_binaria = '1' AND pago = '0'");
                    $UsuariosLados[$ponto->id_usuario] = array('esquerdo' => $PontosLadoEsquerdo->row()->pontos, 'direito' => $PontosLadoDireito->row()->pontos);
                }

                foreach ($quantidadePontos as $id => $pontosCadastrado) {

                    if ($pontosCadastrado['pontos'] > 0) {

                        $LadoEsquerdo = $UsuariosLados[$ponto->id_usuario]['esquerdo'];
                        $LadoDireito = $UsuariosLados[$ponto->id_usuario]['direito'];
                        $QuantidadePlanoAnterior = $quantidadePontos[$this->getPrevKey($id, $quantidadePontos)];

                        if (($LadoEsquerdo >= $QuantidadePlanoAnterior['pontos'] && ($pontosCadastrado['pontos'] - 1) <= $LadoEsquerdo) && ($LadoDireito >= $QuantidadePlanoAnterior['pontos'] && ($pontosCadastrado['pontos'] - 1) <= $LadoDireito)) {


                            if ($pontosCadastrado['pontos'] > $quantidadePontos[InformacoesUsuario('plano_carreira', $ponto->id_usuario)]['pontos']) {

                                if (InformacoesUsuario('plano_carreira', $ponto->id_usuario) != $id) {

                                    if ($this->RegrasDoPlano($ponto->id_usuario, $id)) {

                                        $this->db->where('id_plano_carreira', $id);
                                        $this->db->where('id_usuario', $ponto->id_usuario);
                                        $registros = $this->db->get('usuarios_plano_carreira');

                                        if ($registros->num_rows() <= 0) {

                                            $dadosPlanoCarreira = array(
                                                'id_usuario' => $ponto->id_usuario,
                                                'id_plano_carreira' => $id,
                                                'data' => date('Y-m-d H:i:s')
                                            );

                                            $this->db->where('id', $ponto->id_usuario);
                                            $this->db->update('usuarios', array('plano_carreira' => $id));

                                            $this->db->insert('usuarios_plano_carreira', $dadosPlanoCarreira);


                                            if (!empty($administradores)) {

                                                foreach ($administradores as $administrador) {

                                                    EnviaNotificacao($administrador, 'O usuário ' . InformacoesUsuario('login', $ponto->id_usuario) . ' entrou no plano de carreira: ' . $quantidadePontos[$id]['plano'], 1);
                                                    EnviaNotificacao($ponto->id_usuario, 'Parabéns, você subiu em seu plano de carreira, agora você é ' . $quantidadePontos[$id]['plano']);
                                                }
                                            }
                                        }
                                    }

                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}

?>
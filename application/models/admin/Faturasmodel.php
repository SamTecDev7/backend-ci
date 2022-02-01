<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faturasmodel extends CI_Model {

    protected $rede_total = array();
    protected $todos_niveis = array();

    public function __construct() {
        parent::__construct();
    }

    public function DadosFatura($id) {

        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $usuario = $this->db->get('faturas');

        if ($usuario->num_rows() > 0) {
            return $usuario->row();
        }

        redirect('admin/dashboard');
        exit();
    }

    public function AtualizarFatura($id) {
        $valor = (float) filter_var($this->input->post('valor'), FILTER_SANITIZE_NUMBER_INT) / 100;

        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $update = $this->db->update('faturas', array('valor' => $valor, 'teto' => ($valor + $valor)));

        if ($update) {
            return '<div class="alert alert-success text-center">Fatura atualizada com sucesso!</div>';
        }
    }

    public function ProcuraPatrocinador($id_usuario, $id_patrocinador, $chave_binaria) {

        $this->db->where('id_patrocinador', $id_patrocinador);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('id_usuario != ', $id_usuario);
        $this->db->where('plano_ativo', 1);
        $this->db->order_by('id', 'ASC');
        $rede = $this->db->get('rede');

        if ($rede->num_rows() > 0) {

            $row = $rede->row();

            return $this->ProcuraPatrocinador($id_usuario, $row->id_usuario, $chave_binaria);
        }

        return $id_patrocinador;
    }

    public function AtualizaPatrocinador($id_usuario) {

        $this->db->where('id_usuario', $id_usuario);
        $rede = $this->db->get('rede');

        if ($rede->num_rows() > 0) {

            $row = $rede->row();

            $id_patrocinador_atual = $row->id_patrocinador;
            $posicao_atual = $row->chave_binaria;

            return $this->ProcuraPatrocinador($id_usuario, $id_patrocinador_atual, $posicao_atual);
        }
    }

    public function VerificaBinarioAtivo($id_fatura) {

        $this->db->select('f.*, p.binario');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.id', $id_fatura);
        $fatura = $this->db->get();

        if ($fatura->num_rows() > 0) {

            $row = $fatura->row();

            $this->rede_total = array();
            $this->LinhaIndicacao($row->id_usuario, 1000000);

            if (!empty($this->rede_total)) {

                foreach ($this->rede_total as $patrocinadores) {

                    $this->db->where('id_usuario', $patrocinadores);
                    $this->db->where('plano_ativo', 1);
                    $rede = $this->db->get('rede');

                    if ($rede->num_rows() > 0) {

                        if (InformacoesUsuario('binario', $patrocinadores) == 0) {

                            $this->db->where('id_patrocinador_direto', $patrocinadores);
                            $this->db->where('chave_binaria', 1);
                            $this->db->where('plano_ativo', 1);
                            $LadoEsquerdo = $this->db->get('rede');

                            $this->db->where('id_patrocinador_direto', $patrocinadores);
                            $this->db->where('chave_binaria', 2);
                            $this->db->where('plano_ativo', 1);
                            $LadoDireito = $this->db->get('rede');

                            if ($LadoEsquerdo->num_rows() > 0 && $LadoDireito->num_rows() > 0) {

                                $this->db->where('id', $patrocinadores);
                                $this->db->update('usuarios', array('binario' => 1));
                            }
                        }
                    }
                }
            }
        }
    }

    public function CriaTodosNiveis() {

        $this->db->order_by('nivel', 'ASC');
        $niveis = $this->db->get('configuracao_nivel_indicacoes');

        if ($niveis->num_rows() > 0) {

            foreach ($niveis->result() as $nivel) {

                $this->todos_niveis[$nivel->nivel] = $nivel->porcentagem;
            }
        }
    }

    public function LinhaIndicacao($id, $niveis, $bonus = false) {

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

                $this->LinhaIndicacao($id, $niveis - 1, $bonus);
            }
        }
    }

    public function EncontraLadoVazio($id_usuario, $chave_binaria) {

        $this->db->order_by('id', 'ASC');
        $this->db->where('id_patrocinador', $id_usuario);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('plano_ativo', 1);
        $patrocinadoresSearch = $this->db->get('rede');

        foreach ($patrocinadoresSearch->result() as $resultPatrocinadores) {

            $this->db->where('id_patrocinador', $resultPatrocinadores->id_usuario);
            $this->db->where('chave_binaria', $chave_binaria);
            $this->db->where('plano_ativo', 1);
            $patrocinadorEncontrado = $this->db->get('rede');

            if ($patrocinadorEncontrado->num_rows() > 0) {

                return $this->EncontraLadoVazio($resultPatrocinadores->id_usuario, $chave_binaria);
            } else {

                return $resultPatrocinadores->id_usuario;
            }
        }
    }

    public function CheckChaveBinariaVazia($id_usuario, $id_patrocinador, $chave_binaria) {

        $this->db->where('id_patrocinador', $id_patrocinador);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('plano_ativo', 1);
        $patrocinadores = $this->db->get('rede');

        if ($patrocinadores->num_rows() > 0) {

            $row = $patrocinadores->row();

            if ($row->id_usuario != $id_usuario) {

                return array('id_patrocinador' => $this->EncontraLadoVazio($id_patrocinador, $chave_binaria));
            } else {
                return array('id_patrocinador' => $id_patrocinador);
            }
        } else {

            return array('id_patrocinador' => $id_patrocinador);
        }
    }

    public function PlanosAtivos() {

        $this->db->where('status', 1);
        $planos = $this->db->get('faturas');

        return $planos->num_rows();
    }

    public function TodasFaturas($status = false) {

        $this->db->order_by('data_pagamento', 'ASC');
        if ($status === false) {
            $this->db->where('comprovante IS NOT NULL', null, false);
            $this->db->where('data_pagamento IS NULL', null, false);
            $this->db->where('status', 0);
        } else {
            $this->db->where('status', $status);

            if ($status === 0) {
                $this->db->where('comprovante IS NULL', null, false);
                $this->db->where('data_pagamento IS NULL', null, false);
            }
        }

        $query = $this->db->get('faturas');

        if ($query->num_rows() > 0) {

            return $query->result();
        }

        return false;
    }

    public function LiberarFatura($id) {

        $this->db->where('id', $id);
        $this->db->where('status', 0);
        $fatura = $this->db->get('faturas');

        if ($fatura->num_rows() > 0) {

            $row = $fatura->row();

            $this->db->where('id', $id);
            $update = $this->db->update('faturas', array('status' => 1, 'data_pagamento' => date('Y-m-d')));

            if ($update) {

                $this->db->where('id', $row->id_usuario);
                $this->db->update('usuarios', array('chave_teto' => '0'));

                $this->db->where('id_usuario', $row->id_usuario);
                $redeAfiliado = $this->db->get('rede');

                if ($redeAfiliado->num_rows() > 0) {

                    $rowAfiliado = $redeAfiliado->row();

                    $this->rede_total = array();
                    $this->LinhaIndicacao($row->id_usuario, 10, true);
                    $this->CriaTodosNiveis();

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
                                        $this->db->update('usuarios', array('chave_teto' => '1'));
                                        EnviaNotificacao($patrocinador, 'Teto máximo atingido. Sua conta está pausada, até o teto ser liberado ou aumentado.', 0);

                                    } else {

                                        if (InformacoesUsuario('chave_teto', $patrocinador) == '1') {

                                            $this->db->where('id', $patrocinador);
                                            $this->db->update('usuarios', array('chave_teto' => '0'));

                                        }

                                    }

									if (InformacoesUsuario('chave_teto', $patrocinador) != '1') {

										$bonusIndicacao = ($this->todos_niveis[$nivel + 1] / 100) * $row->valor;
										$novo_saldo = InformacoesUsuario('saldo_rede', $patrocinador) + $bonusIndicacao;
										//AtualizarLucro($patrocinador, $bonusIndicacao, 'Novo usuário na rede ' . InformacoesUsuario('login', $row->id_usuario));
										$this->db->where('id', $patrocinador);
										$this->db->update('usuarios', array('saldo_rede' => $novo_saldo));
										GravaExtrato($patrocinador, $row->id_usuario, $bonusIndicacao, 'Bônus de indicação | ' . InformacoesUsuario('login', $row->id_usuario), 1);

                                    }
                                }
                            }
                        }
                    }

                    $this->db->where('id_usuario', $row->id_usuario);
                    $this->db->where('plano_ativo', 1);
                    $redeCheck = $this->db->get('rede');

                    if ($redeCheck->num_rows() <= 0) {

                        $id_patrocinador = $this->AtualizaPatrocinador($row->id_usuario);

                        $this->db->where('id_usuario', $row->id_usuario);
                        $this->db->update('rede', array('id_patrocinador' => $id_patrocinador, 'plano_ativo' => 1));
                    }
                }

                $this->rede_total = array();
                $this->LinhaIndicacao($row->id_usuario, 1);

                if (!empty($this->rede_total)) {
					if ($row->teto > 0) {
						foreach ($this->rede_total as $patrocinadores) {
							$dadosBinario = array(
								'id_usuario' => $patrocinadores,
								'pontos' => ($row->valor) / 10,
								'mensagem' => 'Pontos de ativação do usuário ' . InformacoesUsuario('login', $row->id_usuario),
								'chave_binaria' => 1,
								'pago' => 0,
								'data' => date('Y-m-d H:i:s')
							);
							$this->db->insert('rede_pontos_binario', $dadosBinario);
						}
					}
                }

                EnviaNotificacao($row->id_usuario, 'Plano ativado com sucesso!');

                return '<div class="alert alert-success text-center">Fatura liberada com sucesso!</div>';
            } else {

                return '<div class="alert alert-danger text-center">Desculpe, mas ocorreu algum erro ao liberar a fatura. Tente novamente.</div>';
            }
        }

        return '<div class="alert alert-danger text-center">Desculpe, mas a fatura já foi liberada ou não existe. Tente novamente.</div>';
    }

}

?>
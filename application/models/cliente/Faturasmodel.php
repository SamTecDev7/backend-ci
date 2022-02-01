<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faturasmodel extends CI_Model {

    protected $userid;
    protected $rede_total = array();
    protected $todos_niveis = array();

    public function __construct() {
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function GerarFatura() {
        $quantidade = (int) $this->input->post('quantidade');
		$coin_qtd = (int) $this->input->post('lifecoin_qtd');
		
		if ($quantidade <> 0) {
			if ($quantidade > 200) {
				return '<div class="alert alert-danger text-center">Valor maximo por cota atingido</div>';
			} else { 
				$valor = ConfiguracoesSistema('valor_cota') * $quantidade;
                $porcentagem_dia = PorcentagemDoDia('porcentagem_dia');

				$this->db->where('id_usuario', $this->userid);
				$this->db->where('status', 0);
				$this->db->where('comprovante IS NULL');
				$delete = $this->db->delete('faturas');

				if ($delete) {
					$data = array(
						'id_usuario' => $this->userid,
						'valor' => $valor,
						'teto' => $valor * 2, // = 100%
						'quantidade_dias' => 999,
						'porcentagem_dia' => $porcentagem_dia,
						'plano_carreira' => 1,
						'rede_afiliados' => 1,
						'status' => 0
					);

					$this->db->insert('faturas', $data);
					redirect('cotas');
					exit();
				}
			}
		} else {
			if ($coin_qtd < ConfiguracoesSistema('minimo_coin')) {
				return '<div class="alert alert-danger text-center">Valor minimo para a compra é de ' . ConfiguracoesSistema('minimo_coin') . ' lifecoins</div>';
			} else {
				$lifecoins_v = $coin_qtd * ConfiguracoesSistema('cotacao_lifecoin');
				
				$this->db->where('id_usuario', $this->userid);
				$this->db->where('status', 0);
				$this->db->where('comprovante IS NULL');
				$delete = $this->db->delete('faturas');

				if ($delete) {
					$data = array(
						'id_usuario' => $this->userid,
						'valor' => $lifecoins_v,
						'lifecoins_v' => $coin_qtd,
						'status' => 0
					);

					$this->db->insert('faturas', $data);
					redirect('cotas');
					exit();
				}
			}
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

    public function ApagarFatura($id) {
        $this->db->where('id', $id);
        $this->db->where('id_usuario', $this->userid);
        $this->db->where('comprovante IS NULL');
        $this->db->where('status', 0);
        $this->db->delete('faturas');
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
                                        // ATUALIZAR SALDO DO USUARIO 
                                        $novo_saldo = InformacoesUsuario('saldo_rede', $patrocinador) + $bonusIndicacao;
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
                                'id_receb' => $row->id_usuario,
								'pontos' => ($row->valor) / 5,
								'mensagem' => 'Pontos de ativação do usuário ' . InformacoesUsuario('login', $row->id_usuario),
								'chave_binaria' => 1,
								'pago' => 0,
								'data' => date('Y-m-d H:i:s')
							);
							$this->db->insert('rede_pontos_binario', $dadosBinario);
						}
					}
				}

				$this->db->where('id', $row->id_usuario);
				$usuario = $this->db->get('usuarios');

				if ($usuario->num_rows() > 0) {

					$rowUser = $usuario->row();

					if ($rowUser->quantidade_binario < $row->binario) {

						$this->db->where('id', $row->id_usuario);
						$this->db->update('usuarios', array('quantidade_binario' => $row->binario));
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

    public function MinhasFaturas() {

        $this->db->where('id_usuario', $this->userid);
        $this->db->order_by('id', 'ASC');
        $faturas = $this->db->get('faturas');

        if ($faturas->num_rows() > 0) {

            return $faturas->result();
        }

        return false;
    }

    public function PagarComSaldo($id_fatura) {

        $this->db->where('id', $id_fatura);
        $fatura = $this->db->get('faturas');

        if ($fatura->num_rows() > 0) {
            $row = $fatura->row();

            $saldo = InformacoesUsuario('saldo', $this->userid);

            if ($saldo >= $row->valor) {
                $novo_saldo = $saldo - $row->valor;

                $this->db->where('id', $this->userid);
                $this->db->update('usuarios', array('saldo' => $novo_saldo));

                $this->LiberarFatura($row->id);
                GravaExtrato($this->userid, $this->userid, $row->valor, 'Compra com saldo' . ' (#' . $row->id . ')', 2);

                $this->session->set_userdata('retorno_msg', "Fatura liberada com sucesso!");
                $this->session->set_userdata('retorno_type', "success");
            } else {
                $this->session->set_userdata('retorno_msg', "Saldo Insuficiente");
                $this->session->set_userdata('retorno_type', "danger");
            }
        }
    }

    public function FormasPagamento() {

        $pagamento = $this->db->get('contas_pagamento');

        if ($pagamento->num_rows() > 0) {

            return $pagamento->result();
        }

        return false;
    }

    public function ValorFatura($id_fatura) {

        $this->db->where('id', $id_fatura);
        $fatura = $this->db->get(faturas);

        if ($fatura->num_rows() > 0) {

            $row = $fatura->row();

            if ($row->status == 0) {

                return json_encode(array('status' => 1, 'valor_fatura' => $row->valor));
            }

            return json_encode(array('status' => 2));
        }

        return json_encode(array('status' => 0));
    }

}

?>
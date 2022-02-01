<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/*date_default_timezone_set('America/Sao_Paulo');
$dia_mes = date('d');
$diasemana_numero = date('w', strtotime(date('Y-m-d')));

if (($dia_mes == 01 || $dia_mes == 15) AND ($diasemana_numero == 5)) {
    $tipo_saque = '1e2';
} else {
    if ($dia_mes == 01 || $dia_mes == 15) {
        $tipo_saque = '1';
    } else {
        if ($diasemana_numero == 5) {
            $tipo_saque = '2';
        }
    }
}*/




class Saquemodel extends CI_Model {

    protected $userid;

    public function __construct() {
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function MinhasContas($categoria_conta = 1) {

        $this->db->where('id_usuario', $this->userid);
        $this->db->where('categoria_conta', $categoria_conta);
        $contas = $this->db->get('usuarios_contas');

        if ($contas->num_rows() > 0) {

            return $contas->result();
        }

        return false;
    }

    public function CadastrarContaBancaria($banco, $agencia, $agencia_digito, $conta, $conta_digito, $tipo_conta, $operacao, $titular, $documento) {

        $dados = array(
            'id_usuario' => $this->userid,
            'codigo_banco' => $banco,
            'agencia' => $agencia,
            'agencia_digito' => $agencia_digito,
            'conta' => $conta,
            'conta_digito' => $conta_digito,
            'operacao' => $operacao,
            'tipo_conta' => $tipo_conta,
            'titular' => $titular,
            'documento' => $documento,
            'categoria_conta' => 1
        );

        $insert = $this->db->insert('usuarios_contas', $dados);

        if ($insert) {

            return json_encode(array('status' => 1, 'id' => $this->db->insert_id()));
        } else {

            return json_encode(array('status' => 0));
        }
    }

    public function ExcluirContaUsuario($id_conta) {

        $this->db->where('id', $id_conta);
        $this->db->where('id_usuario', $this->userid);
        $conta = $this->db->get('usuarios_contas');

        if ($conta->num_rows() > 0) {

            $this->db->where('id', $id_conta);
            $delete = $this->db->delete('usuarios_contas');

            if ($delete) {

                return json_encode(array('status' => 1));
            } else {
                return json_encode(array('status' => 0));
            }
        } else {

            return json_encode(array('status' => 0));
        }
    }

    public function CadastrarCarteiraBitcoin($carteira) {

        $dados = array(
            'id_usuario' => $this->userid,
            'categoria_conta' => 2,
            'carteira_bitcoin' => $carteira
        );

        $insert = $this->db->insert('usuarios_contas', $dados);

        if ($insert) {

            return json_encode(array('status' => 1, 'id' => $this->db->insert_id()));
        } else {

            return json_encode(array('status' => 0));
        }
    }

    public function CadastrarMibank($mibank) {

        $dados = array(
            'id_usuario' => $this->userid,
            'categoria_conta' => 3,
            'mibank' => $mibank
        );

        $insert = $this->db->insert('usuarios_contas', $dados);

        if ($insert) {

            return json_encode(array('status' => 1, 'id' => $this->db->insert_id()));
        } else {

            return json_encode(array('status' => 0));
        }
    }

    function FazerRetirada($metodo, $valor, $tipo_chave, $conta) {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        
        if ($valor < ConfiguracoesSistema('valor_minimo_saque')) {

            return json_encode(array('status' => 4));
        }

        if ($tipo_chave == "") {
            $conta = "Algo deu errado, estorne esse saque e procure o TI";
        }

        if($conta == ""){
            $conta = "Deixei claro para cadastrar a carteira, porem não cadastrou, então... estorne!";
        }

        $taxa_saque = (ConfiguracoesSistema('taxa_saque') / 100 * $valor);
        $valor_desconto = $valor - $taxa_saque;

        if ($metodo == 'Rendimento'){
            if ($valor > InformacoesUsuario('saldo', $this->userid)) {
                return json_encode(array('status' => 2));
            }

            $novo_saldo = InformacoesUsuario('saldo', $this->userid) - $valor;

            $this->db->where('id', $this->userid);
            $update = $this->db->update('usuarios', array('saldo' => $novo_saldo));
    
            if ($update) {
                GravaExtrato($this->userid, 0, $valor_desconto, 'Saque de rendimento', 2);
                GravaExtrato($this->userid, 0, $taxa_saque, 'Taxa do saque', 2);

                $this->db->where('id', $this->userid);
                $this->db->update('usuarios', array('chave_teto' => '0'));
                
                $mensagem = 'Olá <b>' . InformacoesUsuario('nome') . '</b>, foi feita a solicitação de saque de <b>R$ ' . number_format($valor_desconto, 2, ",", ".") . ' Reais</b> em sua conta. Em breve esse valor será disponibilizado via ' . 'PIX';
    
                $dados = array(
                    'id_usuario' => $this->userid,
                    'tipo_saque' => $tipo_chave,
                    'origem' => $metodo,
                    'local_recebimento' => $conta,
                    'valor' => $valor_desconto,
                    'valor_solicitado' => $valor,
                    'status' => 0,
                    'data_pedido' => date('Y-m-d H:i:s')
                );
    
                $this->db->insert('saques', $dados);
    
                return json_encode(array('status' => 1));
            } else {
    
                return json_encode(array('status' => 3, 'error' => '0002'));
            }
        } else {
            if ($metodo == 'Bonus'){
                if ($valor > InformacoesUsuario('saldo_rede', $this->userid)) {
                    return json_encode(array('status' => 2));
                }

                $novo_saldo = InformacoesUsuario('saldo_rede', $this->userid) - $valor;

                $this->db->where('id', $this->userid);
                $update = $this->db->update('usuarios', array('saldo_rede' => $novo_saldo));
        
                if ($update) {
                    GravaExtrato($this->userid, 0, $valor_desconto, 'Saque de bonus', 2);
                    GravaExtrato($this->userid, 0, $taxa_saque, 'Taxa do saque', 2);
                    
                    $mensagem = 'Olá <b>' . InformacoesUsuario('nome') . '</b>, foi feita a solicitação de saque de <b>$ ' . number_format($valor_desconto, 2, ",", ".") . ' dólares</b> em sua conta. Em breve esse valor será disponibilizado via ' . 'PIX';
        
                    $dados = array(
                        'id_usuario' => $this->userid,
                        'tipo_saque' => $tipo_chave,
                        'origem' => $metodo,
                        'local_recebimento' => $conta,
                        'valor' => $valor_desconto,
                        'valor_solicitado' => $valor,
                        'status' => 0,
                        'data_pedido' => date('Y-m-d H:i:s')
                    );
        
                    $this->db->insert('saques', $dados);
        
                    return json_encode(array('status' => 1));
                } else {
        
                    return json_encode(array('status' => 3, 'error' => '0002'));
                }
            }
        }
    }

    public function PagaSaque($id_saque) {

        $this->db->where('id', $id_saque);
        $saques = $this->db->get('saques');

        if ($saques->num_rows() > 0) {

            $row = $saques->row();

            $this->db->where('id', $id_saque);
            $update = $this->db->update('saques', array('status' => 1));

            if ($update) {

                EnviaNotificacao($row->id_usuario, 'Seu saque já foi pago, confira sua conta em alguns minutos!');

                return json_encode(array('status' => 1));
            }
        }

        return json_encode(array('status' => 2));
    }

    public function EstornarSaque($id_saque) {

        $this->db->where('id', $id_saque);
        $saques = $this->db->get('saques');

        if ($saques->num_rows() > 0) {

            $row = $saques->row();

            $this->db->where('id', $id_saque);
            $update = $this->db->update('saques', array('status' => 2));

            if ($saques->row()->origem == 'Rendimento') {
                $novo_saldo = InformacoesUsuario('saldo', $row->id_usuario) + $row->valor_solicitado;
                $coluna = 'saldo';
    
                $this->db->where('id', $row->id_usuario);
                $this->db->update('usuarios', array($coluna => $novo_saldo));
    
                if ($update) {
    
                    GravaExtrato($row->id_usuario, 0, $row->valor_solicitado, 'Saque estornado', 1);
                    EnviaNotificacao($row->id_usuario, 'Contate o administrador, seu saque foi estornado.');
    
                    return json_encode(array('status' => 1));
                }
            }

            if ($saques->row()->origem == 'Bonus') {
                $novo_saldo = InformacoesUsuario('saldo_rede', $row->id_usuario) + $row->valor_solicitado;
                $coluna = 'saldo_rede';
    
                $this->db->where('id', $row->id_usuario);
                $this->db->update('usuarios', array($coluna => $novo_saldo));
    
                if ($update) {
    
                    GravaExtrato($row->id_usuario, 0, $row->valor_solicitado, 'Saque estornado', 1);
                    EnviaNotificacao($row->id_usuario, 'Contate o administrador, seu saque foi estornado.');
    
                    return json_encode(array('status' => 1));
                }
            }
        }

        return json_encode(array('status' => 2));
    }

    public function SaqueLiberado() {

        $hoje = date('w');
        $hora = date('H:i:s');

        $datas = $this->db->get('configuracao_pagamento_saque');

        if ($datas->num_rows() > 0) {

            foreach ($datas->result() as $data) {

                if ($data->dia_pagamento == $hoje) {

                    if ($hora >= $data->horario_inicio && $hora <= $data->horario_termino) {

                        return true;
                    }
                }
            }

            return false;
        }

        return true;
    }

    public function PermitirSaqueRendimento() {
        $this->db->where('id_usuario', $this->userid);
        $this->db->where('status', 1);
        $data = date('Y-m-d', strtotime("-21 days", strtotime(date('Y-m-d'))));

        $this->db->where("data_pagamento <= '$data'");
        $faturas = $this->db->get('faturas');

        if ($faturas->num_rows() > 0) {

            return true;
        }

        return false;
    }

    public function DiasSaques() {

        $saques = $this->db->get('configuracao_pagamento_saque');

        if ($saques->num_rows() > 0) {

            return $saques->result();
        }

        return false;
    }

}

?>
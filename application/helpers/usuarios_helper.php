<?php

function is_logged() {

    $_this = & get_instance();

    if (!$_this->session->has_userdata('uid')) {

        redirect('login');
        exit;
    }
}

function InformacoesUsuario($coluna, $id_user = false) {

    $_this = & get_instance();

    if ($id_user === false) {

        $id_user = $_this->session->userdata('uid');
    }

    $_this->db->where('id', $id_user);
    $usuario = $_this->db->get('usuarios');

    if ($usuario->num_rows() > 0) {

        return $usuario->row()->$coluna;
    }

    return false;
}

function Patrocinador($id_user = false) {

    $_this = & get_instance();

    if ($id_user === false) {

        $id_user = $_this->session->userdata('uid');
    }

    $_this->db->where('id_usuario', $id_user);
    $patrocinador = $_this->db->get('rede');

    if ($patrocinador->num_rows() > 0) {

        return $patrocinador->row()->id_patrocinador_direto;
    }

    return false;
}

function CheckUserIsAdmin() {

    $_this = & get_instance();

    if (!$_this->session->has_userdata('uid_admin')) {

        redirect('admin/844f9ad9fd4409d347446347');
        exit;
    }

    $user_is_admin = InformacoesUsuario('is_admin', $_this->session->userdata('uid_admin'));

    if ($user_is_admin != 1) {

        redirect('admin/844f9ad9fd4409d347446347');
        exit;
    }
}

function PlanoAtivo($id_user = false) {

    $_this = & get_instance();

    if ($id_user === false) {
        $id_user = $_this->session->userdata('uid');
    }

    $_this->db->where('id_usuario', $id_user);
    $_this->db->where('status', 1);
    $_this->db->limit(1);

    $planos = $_this->db->get('faturas');

    if ($planos->num_rows() > 0) {
        return true;
    }

    return false;
}

function AtualizarLucro($id_usuario, $chave_teto, $id_fatura, $pagamento) {

    $_this = & get_instance();

    $_this->db->select('id_usuario');
    $_this->db->select_sum('teto');
    $_this->db->select_sum('lucro');
    $_this->db->where('id_usuario', $id_usuario);
    $_this->db->where('status', 1);
    $faturasTT = $_this->db->get('faturas');

    if ($faturasTT->num_rows() > 0) {

        $faturaTT = $faturasTT->row();
        $saldo_rede = InformacoesUsuario('saldo_rede', $faturaTT->id_usuario);
        
        if ($faturaTT->lucro + $saldo_rede >= $faturaTT->teto) {

            $_this->db->where('id', $faturaTT->id_usuario);
            $_this->db->update('usuarios', array('chave_teto' => '1'));
            EnviaNotificacao($faturaTT->id_usuario, 'Teto máximo atingido. Sua conta está pausada, até o teto ser liberado ou aumentado.', 0);
            
        } else {

            $_this->db->where('id', $id_fatura);
            $_this->db->where('status', 1);
            $faturas = $_this->db->get('faturas');

            if ($faturas->num_rows() > 0) {

                $fatura = $faturas->row();


                if ($fatura->lucro <= $fatura->teto) {

                    $lucro = $fatura->lucro + $pagamento;

                    if ($lucro >= $fatura->teto) {
                        
                        $lucro = $fatura->teto;
                        
                        $_this->db->where('id', $fatura->id);
                        $_this->db->update('faturas', array('data_teto' => strtotime('now'), 'status' => 2));
                    }

                    $_this->db->where('id', $fatura->id);
                    $_this->db->update('faturas', array('lucro' => $lucro));

                    // ATUALIZAR SALDO DO USUARIO
                    $novo_saldo = InformacoesUsuario('saldo', $fatura->id_usuario) + $pagamento;
                    $_this->db->where('id', $fatura->id_usuario);
                    $_this->db->update('usuarios', array('saldo' => $novo_saldo));
                    GravaExtrato($fatura->id_usuario, 0, $pagamento, "Rendimento do pacote ID: 21.0$fatura->id", 1);

                } else {
                    $_this->db->where('id', $fatura->id);
                    $_this->db->update('faturas', array('data_teto' => strtotime('now'), 'status' => 2));
                }
            }
        }
    }
}

function PlanoAtual($coluna, $id_user = false) {

    $_this = & get_instance();

    if ($id_user === false) {
        $id_user = $_this->session->userdata('uid');
    }
    $_this->db->select('*');
    $_this->db->select_sum('lucro');
    $_this->db->select_sum('valor');
    $_this->db->where('id_usuario', $id_user);
    $_this->db->where('status', 1);
    $_this->db->order_by('id', 'ASC');
    $_this->db->limit(1);

    $planos = $_this->db->get('faturas');

    if ($planos->num_rows() > 0) {
        return $planos->row()->$coluna;
    }

    return false;
}

function PlanoCarreira($id, $coluna) {

    $_this = & get_instance();

    $_this->db->where('id', $id);
    $plano_carreira = $_this->db->get('plano_carreira');

    if ($plano_carreira->num_rows() > 0) {

        return $plano_carreira->row()->$coluna;
    }

    return false;
}

function GravaExtrato($id_usuario, $id_remetente, $valor, $mensagem, $tipo, $data = false) {

    $_this = & get_instance();

    if (!$data) {
        $data = date('Y-m-d H:i:s');
    }

    $dados = array(
        'id_usuario' => $id_usuario,
        'id_remetente' => $id_remetente,
        'mensagem' => $mensagem,
        'valor' => $valor,
        'tipo' => $tipo,
        'data' => $data
    );

    $_this->db->insert('extrato', $dados);
}

function EnviaNotificacao($id_usuario, $mensagem, $admin = 0) {

    $_this = & get_instance();

    $dadosNotificacao = array(
        'for_admin' => $admin,
        'id_usuario' => $id_usuario,
        'icone' => 1,
        'mensagem' => $mensagem,
        'data' => date('Y-m-d H:i:s'),
        'visualizada' => 0
    );

    $_this->db->insert('notificacoes', $dadosNotificacao);
}

function EnviarEmail($para, $assunto, $mensagem) {

    $_this = & get_instance();

    if (ConfiguracoesSistema('smtp_enabled') == 1) {

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = ConfiguracoesSistema('smtp_host');
        $config['smtp_user'] = ConfiguracoesSistema('smtp_user');
        $config['smtp_pass'] = ConfiguracoesSistema('smtp_pass');
        $config['smtp_port'] = ConfiguracoesSistema('smtp_port');

        if (ConfiguracoesSistema('smtp_encrypt') != '') {
            $config['smtp_crypto'] = ConfiguracoesSistema('smtp_encrypt');
        } else {
            $config['smtp_crypto'] = 'tls';
        }

        $_this->email->initialize($config);
    }

    $_this->email->to($para);
    $_this->email->from(ConfiguracoesSistema('email_remetente'), ConfiguracoesSistema('nome_site'));
    $_this->email->set_mailtype('html');
    $_this->email->subject($assunto);
    $_this->email->message($mensagem);
    $_this->email->send();
}

?>
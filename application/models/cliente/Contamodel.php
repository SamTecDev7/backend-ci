<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contamodel extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->helper('email');
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

    public function BuscaLadoVazio($id_usuario, $chave_binaria) {

        $this->db->where('id_patrocinador', $id_usuario);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('plano_ativo', 1);
        $rede = $this->db->get('rede');

        if ($rede->num_rows() > 0) {

            $row = $rede->row();

            return $this->BuscaLadoVazio($row->id_usuario, $chave_binaria);
        }

        return $id_usuario;
    }

    public function CheckChaveBinariaVazia($id_patrocinador) {

        $this->db->where('id', $id_patrocinador);
        $user = $this->db->get('usuarios');

        if ($user->num_rows() > 0) {

            $rowUser = $user->row();

            $chaveBinariaAtual = $rowUser->chave_binaria;

            $this->db->where('id_patrocinador', $id_patrocinador);
            $this->db->where('chave_binaria', $chaveBinariaAtual);
            $this->db->where('plano_ativo', 1);
            $patrocinadores = $this->db->get('rede');

            if ($patrocinadores->num_rows() > 0) {

                return array('id_patrocinador_direto' => $id_patrocinador, 'id_patrocinador' => $this->EncontraLadoVazio($id_patrocinador, $chaveBinariaAtual));
            } else {

                return array('id_patrocinador_direto' => $id_patrocinador, 'id_patrocinador' => $id_patrocinador);
            }
        }
    }

    public function Deslogar() {
        session_destroy();

        redirect('login');
        exit;
    }

    public function FazerLogin() {

        $login = strtolower($this->input->post('login'));
        $senha = md5($this->input->post('senha'));

        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $usuario = $this->db->get('usuarios');

        if ($usuario->num_rows() > 0) {

            $row = $usuario->row();

            if ($row->block == 1) {

                return '<div class="alert alert-danger text-center">Conta bloqueada. Por favor, entre em contato com o suporte.</div>';
            }
            if ($row->dfa != NULL) {
                $this->session->set_userdata('id_login', $row->id);
                $this->session->set_userdata('authy', $row->dfa);

                redirect('verificar');
                exit;
            }

            $this->session->set_userdata('uid', $row->id);
            redirect('dashboard');
            exit;
        }

        return '<div class="alert alert-danger text-center">Usuário ou senha inválidos!</div>';
    }

    public function Cadastrar() {

        $patrocinador = $this->input->post('patrocinador');
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $celular = $this->input->post('celular');
        $login = strtolower(trim($this->input->post('login')));
        $senha = $this->input->post('senha');

        if (valid_email($login) === TRUE) {

            return '<div class="alert alert-danger text-center">Não use seu email em seu login. Por favor, tente novamente.</div>';
        }

        $this->db->where('email', $email);
        $usuarios = $this->db->get('usuarios');

        if ($usuarios->num_rows() > 0) {

            return '<div class="alert alert-danger text-center">Email já cadastrado. Por favor, use outro.</div>';
        }

        $this->db->where('cpf', $cpf);
        $usuarios = $this->db->get('usuarios');

        if ($usuarios->num_rows() >= ConfiguracoesSistema('maximo_cpfs')) {

            return '<div class="alert alert-danger text-center">CPF já atingiu o número máximo de registros. Por favor, use outro.</div>';
        }

        $this->db->where('login', $login);
        $usuarios = $this->db->get('usuarios');

        if ($usuarios->num_rows() > 0) {

            return '<div class="alert alert-danger text-center">Login já cadastrado. Por favor, escolha outro.</div>';
        }


        $this->db->where('login', $patrocinador);
        $usuarios = $this->db->get('usuarios');

        if ($usuarios->num_rows() <= 0) {

            return '<div class="alert alert-danger text-center">Patrocinador não encontrato. Por favor, preencha novamente.</div>';
        }

        $dadosUsuario = array(
            'nome' => htmlentities($nome),
            'email' => htmlentities($email),
            'cpf' => htmlentities($cpf),
            'celular' => htmlentities($celular),
            'login' => htmlentities($login),
            'senha' => md5($senha),
            'saldo' => 0,
            'plano_carreira' => 1,
            'binario' => 0,
            'chave_binaria' => 1,
            'block' => 0,
            'data_cadastro' => date('Y-m-d H:i:s')
        );


        $cadastraUsuario = $this->db->insert('usuarios', $dadosUsuario);

        if ($cadastraUsuario) {

            $id_novo_usuario = $this->db->insert_id();

            $dadosPlanoCarreira = array(
                'id_usuario' => $id_novo_usuario,
                'id_plano_carreira' => 1,
                'data' => date('Y-m-d H:i:s')
            );

            $cadastraPlanoCarreira = $this->db->insert('usuarios_plano_carreira', $dadosPlanoCarreira);

            //PATROCINADOR 
            $row = $usuarios->row();

            $id_patrocinador_direto = $row->id;

            $id_patrocinador = $this->BuscaLadoVazio($id_patrocinador_direto, $row->chave_binaria);

            $array_patrocinador = array(
                'id_usuario' => $id_novo_usuario,
                'id_patrocinador' => $id_patrocinador,
                'chave_binaria' => $row->chave_binaria,
                'id_patrocinador_direto' => $id_patrocinador_direto,
                'plano_ativo' => 0
            );

            $this->db->insert('rede', $array_patrocinador);


            $mensagem = 'Olá <b>' . $nome . '</b>, bem vindo a ' . ConfiguracoesSistema('nome_site') . ' agora você faz parte do nosso grupo de afiliados. <br />';
            $mensagem .= 'Segue abaixo os dados de acesso a sua conta em nosso site: <br /><br />';
            $mensagem .= '<b>Login:</b> ' . $login . ' <br />';
            $mensagem .= '<b>Senha:</b> ****** <br /><br />';
            $mensagem .= 'Todas as suas informações são sigilosas, então não compartilhe seu login e senha com ninguém. <br />';
            $mensagem .= 'Caso precise de suporte, acesse seu backoffice e clique em "Suporte" e abra um ticket, responderemos o mais rápido possível.';

            EnviarEmail($email, 'Cadastro realizado com sucesso!', $mensagem);

            return '<div class="alert alert-success text-center">Cadastro feito com sucesso!</div>';
        }


        return '<div class="alert alert-danger text-center">Erro ao cadastrar sua conta. Tente novamente.</div>';
    }

    public function EnviarEmailRecuperacao($email) {

        if (!empty($email)) {

            $codigo = md5(time() . rand(400, 9999));

            $this->db->where('email', $email);
            $usuarios = $this->db->get('usuarios');

            if ($usuarios->num_rows() > 0) {

                $row = $usuarios->row();

                $dadosRecuperacao = array(
                    'id_usuario' => $row->id,
                    'codigo' => $codigo,
                    'usado' => 0,
                    'data' => date('Y-m-d H:i:s')
                );

                $this->db->insert('codigos_verificacao', $dadosRecuperacao);

                $mensagem = 'Olá, recebemos o pedido de alteração de senha. Segue abaixo, o código de recuperação: <br />';
                $mensagem .= '<b>Código:</b> ' . $codigo . '<br /><br />';
                $mensagem .= 'Caso prefira, clique no link abaixo e gere a nova senha: <br />';
                $mensagem .= '<b>Link de recuperação:</b> <a href="' . base_url('recuperar/' . $codigo) . '" target="_blank">' . base_url('recuperar/' . $codigo) . '</a><br /><br />';

                EnviarEmail($email, 'Link de recuperação de senha', $mensagem);

                return array('mensagem' => '<div class="alert alert-success text-center">Link enviado com sucesso, verifique seu email.</div>', 'status' => 1);
            }

            return array('mensagem' => '<div class="alert alert-danger text-center">Email não encontrado. Informe-o novamente.</div>', 'status' => 0);
        }

        return array('mensagem' => '<div class="alert alert-danger text-center">Por favor, informe seu email de cadastro.</div>', 'status' => 0);
    }

    public function RedirecionaLink($codigo = false) {

        if ($codigo !== false && !empty($codigo)) {

            redirect('recuperar/' . $codigo);
            return;
        }

        return array('mensagem' => '<div class="alert alert-danger text-center">Informe código de verificação.</div>', 'status' => 0);
    }

    public function ResetarSenha($codigo) {

        $this->db->where('codigo', $codigo);
        $this->db->where('usado', 0);
        $codigos_verificacao = $this->db->get('codigos_verificacao');

        if ($codigos_verificacao->num_rows() > 0) {

            $row = $codigos_verificacao->row();

            $nova_senha = mt_rand(9843743, 735248123);

            $mensagem = 'Olá, sua senha foi resetada com sucesso, segue abaixo: <br /><br />';
            $mensagem .= '<b>Nova senha:</b> ' . $nova_senha . '<br /><br />';
            $mensagem .= 'Guarde essa senha com você e não compartilhe com ninguém para sua própria segurança.';

            $this->db->where('id', $row->id_usuario);
            $atualiza = $this->db->update('usuarios', array('senha' => md5($nova_senha)));

            if ($atualiza) {

                EnviarEmail(InformacoesUsuario('email', $row->id_usuario), 'Senha alterada com sucesso!', $mensagem);

                $this->db->where('codigo', $codigo);
                $this->db->update('codigos_verificacao', array('usado' => 1));

                return '<div class="alert alert-success text-center">Senha alterada com sucesso. Você receberá um novo email com a nova senha!</div> <br /> <a href="' . base_url('login') . '" class="btn btn-primary btn-block">Fazer Login</a>';
            }

            return '<div class="alert alert-danger text-center">Desculpe, mas não foi possível alterar sua senha. Tente novamente.</div> <br /> <a href="' . base_url('recuperar') . '" class="btn btn-primary btn-block">Voltar</a>';
        }

        return '<div class="alert alert-danger text-center">Código não existe ou expirou.</div> <br /> <a href="' . base_url('recuperar') . '" class="btn btn-primary btn-block">Voltar</a>';
    }

}

?>
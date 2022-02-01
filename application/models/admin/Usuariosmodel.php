<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariosmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function TotalUsuarios() {

        $usuarios = $this->db->get('usuarios');

        return $usuarios->num_rows();
    }

    public function TodosUsuarios($limit) {

        $buscar = ($this->input->post('buscar') && array_filter($this->input->post('buscar'))) ? $this->input->post('buscar') : false;

        if ($buscar) {
            foreach ($buscar as $campo => $dados) {
                $this->db->like($campo, $dados);
            }
        } else {
            $pagination_config = config_item('pagination_config');
            $pagination_config['base_url'] = base_url('admin/usuarios');

            $pagination_config['total_rows'] = $this->db->get('usuarios')->num_rows();

            $this->pagination->initialize($pagination_config);
        }

        $this->db->order_by('id', 'desc');
        if (!$buscar) {
            $this->db->limit($this->pagination->per_page, $limit);
        }

        $usuarios = $this->db->get('usuarios');

        if ($usuarios->num_rows() > 0) {

            return $usuarios->result();
        }

        return false;
    }

    public function DadosUsuario($id) {

        $dados = array();

        $this->db->where('id', $id);
        $usuario = $this->db->get('usuarios');

        if ($usuario->num_rows() > 0) {

            $rowUsuario = $usuario->row();

            $dados['usuario'] = $rowUsuario;

            $dados['usuario']->totalinvestido = number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM faturas WHERE id_usuario = '$id' AND status != '0'")->row()->valor, 2, ",", ".");
            $dados['usuario']->totalsaques = number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM saques WHERE id_usuario = '$id' AND status = '1'")->row()->valor, 2, ",", ".");
            $dados['usuario']->totaldebito = number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM extrato WHERE id_usuario = '$id' AND tipo = '2'")->row()->valor, 2, ",", ".");
            $dados['usuario']->totalcredito = number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM extrato WHERE id_usuario = '$id' AND tipo = '1'")->row()->valor, 2, ",", ".");
            $dados['usuario']->lucro = number_format($this->db->query("SELECT COALESCE(SUM(lucro), 0) as valor FROM faturas WHERE id_usuario = '$id' AND status = '1'")->row()->valor, 2, ",", ".") . " de " . number_format($this->db->query("SELECT COALESCE(SUM(teto), 0) as valor FROM faturas WHERE id_usuario = '$id' AND status = '1'")->row()->valor, 2, ",", ".");

            $this->db->where('id_usuario', $id);
            $contasBancarias = $this->db->get('usuarios_contas');

            if ($contasBancarias->num_rows() > 0) {

                $dados['contas'] = $contasBancarias->result();
            }

            $this->db->select('upc.data, pc.nome');
            $this->db->from('usuarios_plano_carreira AS upc');
            $this->db->join('plano_carreira AS pc', 'pc.id = upc.id_plano_carreira', 'inner');
            $this->db->where('upc.id_usuario', $id);
            $this->db->order_by('upc.id', 'DESC');

            $planoCarreira = $this->db->get();

            if ($planoCarreira->num_rows() > 0) {

                $dados['plano_carreira'] = $planoCarreira->result();
            }

            $this->db->select_sum('pontos');
            $this->db->from('rede_pontos_binario');
            $this->db->where('id_usuario', $id);
            $this->db->where('chave_binaria', 1);
            $queryBinarioEsquerdo = $this->db->get();

            $this->db->select_sum('pontos');
            $this->db->from('rede_pontos_binario');
            $this->db->where('id_usuario', $id);
            $this->db->where('chave_binaria', 2);
            $queryBinarioDireito = $this->db->get();

            if ($queryBinarioEsquerdo->num_rows() > 0) {

                $pontosEsquerdo = $queryBinarioEsquerdo->row()->pontos;

                $dados['binario']['esquerdo'] = (!empty($pontosEsquerdo)) ? $pontosEsquerdo : 0;
            } else {
                $dados['binario']['esquerdo'] = 0;
            }

            if ($queryBinarioDireito->num_rows() > 0) {

                $pontosDireito = $queryBinarioDireito->row()->pontos;

                $dados['binario']['direito'] = (!empty($pontosDireito)) ? $pontosDireito : 0;
            } else {
                $dados['binario']['direito'] = 0;
            }


            $this->db->where('id_usuario', $id);
            $extratos = $this->db->get('extrato');

            if ($extratos->num_rows() > 0) {

                $dados['extrato'] = $extratos->result();
            }
            
            $this->db->where('id_usuario', $id);
            $extratopontos = $this->db->get('rede_pontos_binario');

            if ($extratopontos->num_rows() > 0) {

                $dados['rede_pontos_binario'] = $extratopontos->result();
            }

            return $dados;
        }

        redirect('admin/usuarios');
    }

    public function AtualizarUsuario($id) {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $celular = $this->input->post('celular');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        $block = $this->input->post('block');
        $is_admin = $this->input->post('is_admin');
        $saldo = $this->input->post('saldo');
        $quantidade_binario = $this->input->post('quantidade_binario');

        $this->db->where('email', $email);
        $userEmail = $this->db->get('usuarios');

        if ($userEmail->num_rows() > 0) {

            $userEmailRow = $userEmail->row();

            if ($id != $userEmailRow->id) {

                return '<div class="alert alert-danger text-center">O email informado já está em uso. Escolha outro.</div>';
            }
        }

        $this->db->where('login', $login);
        $userLogin = $this->db->get('usuarios');

        if ($userLogin->num_rows() > 0) {

            $userLoginRow = $userLogin->row();

            if ($id != $userLoginRow->id) {

                return '<div class="alert alert-danger text-center">O login informado já está em uso. Escolha outro.</div>';
            }
        }

        $dados = array(
            'nome' => $nome,
            'email' => $email,
            'cpf' => $cpf,
            'celular' => $celular,
            'login' => $login,
            'block' => $block,
            'is_admin' => $is_admin,
            'saldo' => $saldo,
            'quantidade_binario' => $quantidade_binario
        );

        if (!empty($senha)) {
            $dados['senha'] = md5($senha);
        }

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $dados);

        if ($update) {

            return '<div class="alert alert-success text-center">Usuário atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário. Tente novamente.</div>';
    }

    public function AdicionarPontos($id_usuario) {
        $pontos = $this->input->post('pontos');

        $dadosBinario = array(
            'id_usuario' => $id_usuario,
            'pontos' => $pontos,
            'mensagem' => 'Pontos adicionados pela administração',
            'chave_binaria' => 1,
            'pago' => 0,
            'data' => date('Y-m-d H:i:s')
        );

        $insert = $this->db->insert('rede_pontos_binario', $dadosBinario);

        if ($insert) {

            return '<div class="alert alert-success text-center">Pontos atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao adicionar os pontos ao usuário. Tente novamente.</div>';
    }

}

?>
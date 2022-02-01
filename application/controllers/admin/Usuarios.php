<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/usuariosmodel', 'UsuariosModel');
        $this->load->helper('bancos');
    }

    public function usuarios($limit = 0) {
        $this->load->library('pagination');

        $data['jsLoader'] = array(
            'assets/pages/admin/usuarios.js?2'
        );

        $data['usuarios'] = $this->UsuariosModel->TodosUsuarios($limit);

        $this->template->load('admin/templates/template', 'admin/usuarios/usuarios', $data);
    }

    public function visualizar($id) {

        $data['jsLoader'] = array(
            'assets/pages/admin/usuarios.js?2'
        );

        $data['usuario'] = $this->UsuariosModel->DadosUsuario($id);

        $this->template->load('admin/templates/template', 'admin/usuarios/visualizar', $data);
    }

    public function editar($id) {

        $data['jsLoader'] = array(
            'assets/plugins/maskedinput/jquery.maskedinput.min.js',
            'assets/pages/admin/usuarios.js?2'
        );

        if ($this->input->post('submit')) {

            $data['message'] = $this->UsuariosModel->AtualizarUsuario($id);
        }

        $data['usuario'] = $this->UsuariosModel->DadosUsuario($id);

        $this->template->load('admin/templates/template', 'admin/usuarios/editar', $data);
    }
    
    public function pontos($id) {

        $data['jsLoader'] = array(
            'assets/plugins/maskedinput/jquery.maskedinput.min.js',
            'assets/pages/admin/usuarios.js?2'
        );
        
        $data['usuario'] = $this->UsuariosModel->DadosUsuario($id);

        if ($this->input->post('submit')) {

            $data['message'] = $this->UsuariosModel->AdicionarPontos($id);
        }

        $this->template->load('admin/templates/template', 'admin/usuarios/pontos', $data);
    }


}

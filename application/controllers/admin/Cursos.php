<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/Cursosmodel', 'CursosModel');
    }

    public function index(){

        $data['cursos'] = $this->CursosModel->TodosCursos();

        $this->template->load('admin/templates/template', 'admin/cursos/cursos', $data);
    }

    public function adicionar(){

        $data = array();

        if($this->input->post('submit')){

            $data['message'] = $this->CursosModel->NovoCurso();
        }

        $this->template->load('admin/templates/template', 'admin/cursos/adicionar', $data);
    }

    public function editar($id){

        if($this->input->post('submit')){

            $data['message'] = $this->CursosModel->EditarCurso($id);
        }

        $data['curso'] = $this->CursosModel->InformacoesCurso($id);

        $this->template->load('admin/templates/template', 'admin/cursos/editar', $data);
    }

    public function excluir($id){

        $this->CursosModel->ExcluirCurso($id);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged();
        
        $this->load->model('cliente/cursosmodel', 'CursosModel');
    }

    public function index(){

        $data['cursos'] = $this->CursosModel->TodosCursos();

        $this->template->load('cliente/templates/template', 'cliente/cursos/cursos', $data);
    }

    public function meuscursos(){
        $data['cursos'] = $this->CursosModel->MeusCursos();

        $this->template->load('cliente/templates/template', 'cliente/cursos/meus', $data);
    }
    
    public function comprar($id_curso){
        if($id_curso){
            
          $tipo_saque = $this->input->post('tipo_saque');
          
          if ($this->CursosModel->Comprar($id_curso, $tipo_saque)) {
              redirect('cursos/meus');
          }else{
              redirect('cursos');
          }
          
        }
    }
}
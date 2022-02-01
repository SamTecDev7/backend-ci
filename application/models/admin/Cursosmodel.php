<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursosmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function TodosCursos(){

        $this->db->order_by('id', 'DESC');
        $cursos = $this->db->get('cursos');

        if($cursos->num_rows() > 0){

            return $cursos->result();
        }

        return false;
    }

    public function NovoCurso(){

        $nome = $this->input->post('nome');
        $texto = $this->input->post('texto');
        $valor = $this->input->post('valor');
        $link = $this->input->post('link');
        
        if (!is_numeric($link)) {
            return '<div class="alert alert-danger text-center">O código do vídeo é ínvalido</div>';
        }
        
        $dados = array(
                       'nome'=>$nome,
                       'texto'=>$texto,
                       'valor'=>$valor,
                       'link'=>$link,
                    );

        $insert = $this->db->insert('cursos', $dados);

        if($insert){

            return '<div class="alert alert-success text-center">Curso adicionado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao adicionar o curso. Tente novamente.</div>';
    }

    public function InformacoesCurso($id){

        $this->db->where('id', $id);
        $curso = $this->db->get('cursos');

        if($curso->num_rows() > 0){

            return $curso->row();
        }

        return false;
    }

    public function EditarCurso($id){

        $nome = $this->input->post('nome');
        $texto = $this->input->post('texto');
        $valor = $this->input->post('valor');
        $link = $this->input->post('link');

        if (!is_numeric($link)) {
            return '<div class="alert alert-danger text-center">O código do vídeo é ínvalido</div>';
        }
        
        $dados = array(
                       'nome'=>$nome,
                       'texto'=>$texto,
                       'valor'=>$valor,
                       'link'=>$link,
                    );

        $this->db->where('id', $id);
        $update = $this->db->update('cursos', $dados);

        if($update){

            return '<div class="alert alert-success text-center">Curso atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar o curso. Tente novamente.</div>';
    }

    public function ExcluirCurso($id){

        $this->db->where('id', $id);
        $this->db->delete('cursos');
        
        $this->db->where('id_curso', $id);
        $this->db->delete('usuarios_cursos');
        
        redirect('admin/cursos');
    }
}
?>
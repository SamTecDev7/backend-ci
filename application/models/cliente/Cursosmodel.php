<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursosmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();
        $this->userid = InformacoesUsuario('id');
    }

    public function TodosCursos(){

        $this->db->order_by('valor', 'ASC');
        $cursos = $this->db->get('cursos');

        if($cursos->num_rows() > 0){

            return $cursos->result();
        }

        return false;
    }

    
    public function MeusCursos(){
        $this->db->select('c.*');
        $this->db->from('usuarios_cursos AS u');
        $this->db->join('cursos AS c', 'u.id_curso = c.id', 'inner');
        $this->db->where('u.id_usuario', $this->userid);
        $cursos = $this->db->get();

        if($cursos->num_rows() > 0){

            return $cursos->result();
        }

        return false;
    }
    

   public function Comprar($id_curso, $tipo_saque){
        $this->db->where('id', $id_curso);
        $cursos = $this->db->get('cursos');
        
        if($cursos->num_rows() > 0){
            
            $curso = $cursos->row();
            

            if ($curso->valor > InformacoesUsuario('saldo')) {
                    $this->session->set_userdata('message_curso', "Seu saldo é menor que o valor do curso");
                    return false;
            }
                    
            $retirar_de = "saldo";
            
            
            $novo_saldo = InformacoesUsuario($retirar_de) - $curso->valor;
            
            $this->db->where('id', $this->userid);
            $this->db->update('usuarios', array($retirar_de => $novo_saldo));
            GravaExtrato($this->userid, 0, $curso->valor, 'Compra do curso: '.$curso->nome, 2);
            
            $data = array(
                'id_usuario'=>$this->userid,
                'id_curso'=>$id_curso,
            );
            
            $this->db->insert('usuarios_cursos', $data);
            $this->session->set_userdata('message_curso', "Compra do curso realizada com sucesso!");
            return true;
        }
        
        return false;
    }
}
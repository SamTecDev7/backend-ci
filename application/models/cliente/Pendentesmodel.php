<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendentesmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }
    
    public function Linear(){

        $this->rede_total = array();
        $this->LinhaIndicacao($this->userid, 5);

        if(!empty($this->rede_total)){
            foreach($this->rede_total as $nivel=>$id){
                foreach ($id as $v) {
                    
                    $array = uniqid();
                    $this->db->where('id', $v);
                    $u = $this->db->get('usuarios');

                    if ($u->num_rows() > 0) {
                        $usuarios[$array] = $u->row();
                        $usuarios[$array]->nivel = $nivel;
                    }
                    
                }
                
            }
            if (isset($usuarios)) {
                return $usuarios;
            }
        }
    }

    public function LinhaIndicacao($id, $niveis, $sequencia = 1){
        if($sequencia !== ( $niveis + 1 )){

            $this->db->where('id_patrocinador_direto', $id);

            $patrocinadores = $this->db->get('rede');

                if($patrocinadores->num_rows() > 0){

                    foreach ($patrocinadores->result() as $p) {

                        $id = $p->id_usuario;

                        $this->rede_total[$sequencia][] = $id;

                        $this->LinhaIndicacao($id, $niveis, $sequencia + 1);
                    }
                }
        }
       
    }
    
    public function UsuariosAtivos(){

        $this->db->select('u.*');
        $this->db->from('rede AS r');
        $this->db->join('usuarios AS u', 'u.id = r.id_usuario', 'inner');
        $this->db->where('r.plano_ativo', 1);
        $this->db->where('r.id_patrocinador_direto', $this->userid);
        $usuarios = $this->db->get();

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }

    public function UsuariosPendentes(){

        $this->db->select('u.*');
        $this->db->from('rede AS r');
        $this->db->join('usuarios AS u', 'u.id = r.id_usuario', 'inner');
        $this->db->where('r.plano_ativo', 0);
        $this->db->where('r.id_patrocinador_direto', $this->userid);
        $usuarios = $this->db->get();

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprovantemodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');

        $this->load->library('upload');
    }

    public function EnviarComprovante(){

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'pdf|jpg|jpeg|gif|png';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if($this->upload->do_upload('comprovante')){

            $data = $this->upload->data();

            $this->db->where('id_usuario', $this->userid);
            $this->db->where('status', 0);
            $faturas = $this->db->get('faturas');

            if($faturas->num_rows() > 0){

                $row = $faturas->row();

                $this->db->where('id', $row->id);
                $this->db->update('faturas', array('comprovante'=>$data['file_name']));

                return  '<div class="alert alert-success text-center">Comprovante anexado com sucesso!</div>';

            }else{

                return  '<div class="alert alert-danger text-center">Desculpe, mas não encontramos nenhuma fatura em aberto para anexar um comprovante. Por favor, verifique.</div>';
            }

        }else{

            return  '<div class="alert alert-danger text-center">Erro: '.$this->upload->display_errors().'</div>';
        }
    }
}
?>
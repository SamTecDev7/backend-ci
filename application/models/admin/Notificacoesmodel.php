<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacoesmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = $this->session->userdata('uid_admin');
    }

    public function EnviarNotificacoes(){

        $contagem = 0;

        $notificacao = $this->input->post('notificacao');

        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            foreach($usuarios->result() as $usuario){

                $dados = array(
                               'for_admin'=>0,
                               'id_usuario'=>$usuario->id,
                               'icone'=>1,
                               'mensagem'=>$notificacao,
                               'data'=>date('Y-m-d H:i:s'),
                               'visualizada'=>0
                            );

                $insert = $this->db->insert('notificacoes', $dados);

                if($insert){

                    $contagem++;
                }
            }
        }

        if($contagem > 0){

            return '<div class="alert alert-success text-center">Notificações enviadas para '.$contagem.' pessoa(s)</div>';
        }

        return '<div class="alert alert-danger text-center">Não foi possível enviar sua notificação. tente novamente.</div>';
    }

    public function NotificacoesAdmin($limite = false){

      if($limite !== false){
        $this->db->limit($limite);
      }
      
      $this->db->order_by('data', 'DESC');
      $this->db->where('for_admin', 1);
      $this->db->where('id_usuario', $this->userid);
      $notificacoes = $this->db->get('notificacoes');

      if($notificacoes->num_rows() > 0){

        return $notificacoes->result();

      }

      return false;
    }
}
?>
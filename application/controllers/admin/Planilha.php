<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilha extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();
    }

    public function index(){
        if($this->input->post('limite') !== NULL){
            $this->db->order_by('id', 'ASC');
            
            $this->db->limit($this->input->post('limite'));
            
            $usuarios = $this->db->get('usuarios');

            if($usuarios->num_rows() > 0){

                $dadosXls = "";
                $dadosXls .= "<table border='1'>";
                $dadosXls .= "<tr>";
                    $dadosXls .= "<th>Login</th>";
                    $dadosXls .= "<th>Total investido</th>";
                    $dadosXls .= "<th>Total de saques</th>";
                    $dadosXls .= "<th>Total de débitos (Inclui Saques, Ativações com saldo e Transferência de saldo)</th>";
                    $dadosXls .= "<th>Total de crédito (Inclui Rendimentos, indicações e estornos de saques)</th>";
                    $dadosXls .= "<th>Lucro após modificação</th>";
                $dadosXls .= "</tr>";

                    foreach($usuarios->result() as $usuario){                    
                        $dadosXls .= "<tr>";
                        $dadosXls .= "<td>".$usuario->login."</td>";
                        $dadosXls .= "<td>".number_format($this->db->query("SELECT COALESCE(SUM(p.valor), 0) as valor FROM faturas as f INNER JOIN planos as p ON f.id_plano = p.id WHERE f.id_usuario = '$usuario->id' AND f.status != '0'")->row()->valor, 2, ",", ".")."</td>";
                        $dadosXls .= "<td>".number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM saques WHERE id_usuario = '$usuario->id' AND status = '1'")->row()->valor, 2, ",", ".")."</td>";
                        $dadosXls .= "<td>".number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM extrato WHERE id_usuario = '$usuario->id' AND tipo = '2'")->row()->valor, 2, ",", ".")."</td>";
                        $dadosXls .= "<td>".number_format($this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM extrato WHERE id_usuario = '$usuario->id' AND tipo = '1'")->row()->valor, 2, ",", ".")."</td>";
                        $dadosXls .= "<td>".number_format($this->db->query("SELECT COALESCE(SUM(lucro), 0) as valor FROM faturas WHERE id_usuario = '$usuario->id' AND status = '1'")->row()->valor, 2, ",", ".")." de ".number_format($this->db->query("SELECT COALESCE(SUM(p.teto), 0) as valor FROM faturas as f INNER JOIN planos as p ON f.id_plano = p.id WHERE f.id_usuario = '$usuario->id' AND f.status = '1'")->row()->valor, 2, ",", ".")."</td>";
                        $dadosXls .= "</tr>";
                    }

                $dadosXls .= "</table>";
                echo "<script> window.print(); </script>";
                echo $dadosXls;
                die();

            }
        }
    }
}
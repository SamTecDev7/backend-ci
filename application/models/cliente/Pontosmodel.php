<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontosmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function PontosBinario(){

        $pontosHojeDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND data = '".date('Y-m-d')."' AND chave_binaria = '2'");
        $pontosHojeEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND data = '".date('Y-m-d')."' AND chave_binaria = '1'");

        $pontosTotalDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND pago = '1' AND chave_binaria = '2'");
        $pontosTotalEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND pago = '1' AND chave_binaria = '1'");

        $pontosTransferirDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND chave_binaria = '2' AND pago = '0'");
        $pontosTransferirEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND chave_binaria = '1' AND pago = '0'");

        $rowPontosHojeDireito = $pontosHojeDireito->row();
        $rowPontosHojeEsquerdo = $pontosHojeEsquerdo->row();

        $rowPontosTotalDireito = $pontosTotalDireito->row();
        $rowPontosTotalEsquerdo = $pontosTotalEsquerdo->row();

        $rowPontosTransferirDireito = $pontosTransferirDireito->row();
        $rowPontosTransferirEsquerdo = $pontosTransferirEsquerdo->row();

        return array(
                     'hoje'=>array(
                                   'direito'=>$rowPontosHojeDireito->pontos,
                                   'esquerdo'=>$rowPontosHojeEsquerdo->pontos
                                   ),
                     'total'=>array(
                                   'direito'=>$rowPontosTotalDireito->pontos,
                                   'esquerdo'=>$rowPontosTotalEsquerdo->pontos
                                   ),
                     'transferir'=>array(
                                   'direito'=>$rowPontosTransferirDireito->pontos,
                                   'esquerdo'=>$rowPontosTransferirEsquerdo->pontos
                                   )
                     );
    }
    
    public function TodosExtratos(){

        $this->db->order_by('id', 'DESC');
        $this->db->where('id_usuario', $this->userid);
        $extratos = $this->db->get('rede_pontos_binario');

        if($extratos->num_rows() > 0){

            return $extratos->result();
        }

        return false;
    }
}
?>
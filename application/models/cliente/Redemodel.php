<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redemodel extends CI_Model{

    protected $userid;
    protected $matrizHTML;
    protected $contagem = 0;
    protected $todos_rede = array();

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function TodosRede($id_patrocinador){

        $this->db->where('id_patrocinador', $id_patrocinador);
        $this->db->where('plano_ativo', 1);
        $rede = $this->db->get('rede');

        if($rede->num_rows() > 0){

            foreach($rede->result() as $row){

                $this->todos_rede[] = $row->id_usuario;

                $this->TodosRede($row->id_usuario);

            }
        }
    }

    public function ExisteNaRede($id_usuario){

        $this->todos_rede = array();

        $id_visualizador = $this->userid;

        $this->TodosRede($id_visualizador);

        if(in_array($id_usuario, $this->todos_rede)){

            return true;
        }else{
            return false;
        }
    }

    public function QuantidadeTodaRede(){

        $this->TodosRede($this->userid);

        return count($this->todos_rede);
    }

    public function QuantidadeRede($userid, $chave_binaria = 1){

        if($chave_binaria !== false){
            $this->db->where('chave_binaria', $chave_binaria);
        }

        $this->db->where('plano_ativo', 1);
        $this->db->where('id_patrocinador', $userid);
        $rede = $this->db->get('rede');

        if($rede->num_rows() > 0){

            foreach($rede->result() as $row){

                $this->contagem++;

                $this->QuantidadeRede($row->id_usuario, false);

            }
        }

        return $this->contagem;
    }

    public function CriaDesenhaMatriz($user = false, $niveis = 4, $binario = 2){

        if($niveis > 0){

            $this->db->where('id_patrocinador', $user);
            $this->db->where('chave_binaria', 2);
            $this->db->where('plano_ativo', 1);
            $BinarioDireito = $this->db->get('rede');


            $this->db->where('id_patrocinador', $user);
            $this->db->where('chave_binaria', 1);
            $this->db->where('plano_ativo', 1);
            $BinarioEsquerdo = $this->db->get('rede');

            $this->matrizHTML .= '<ul>';

            for($i = 1; $i<= $binario; $i++){

                $lado = ($i == 1) ? 'Esquerdo' : 'Direito';

                if($i == 1){

                    if($BinarioEsquerdo->num_rows() > 0){

                        $rowEsquerdo = $BinarioEsquerdo->row();

                        $this->matrizHTML .= '<li>';

                        $this->matrizHTML .= '<a href="?network_id='.$rowEsquerdo->id_usuario.'"><img src="https://workanatestes.tk/bitcoin.png" border="0" class="tooltipster" title="Nome: '.InformacoesUsuario('nome', $rowEsquerdo->id_usuario).' <br /> Celular: '.InformacoesUsuario('celular', $rowEsquerdo->id_usuario).'" width="50" style="opacity: 1"/></a> <br /><font color="black">'.InformacoesUsuario('nome', $rowEsquerdo->id_usuario).'</font>';

                        $this->CriaDesenhaMatriz($rowEsquerdo->id_usuario, $niveis-1);

                        $this->matrizHTML .= '</li>';
                    }else{

                        $this->matrizHTML .= '<li>';

                        $this->matrizHTML .= '<img src="https://workanatestes.tk/bitcoin.png" width="50" style="opacity: 0.4"/> <br /><font color="black">&nbsp;</font>';

                        $this->CriaDesenhaMatriz(false, $niveis-1);

                        $this->matrizHTML .= '</li>';
                    }
                }

                if($i == 2){

                    if($BinarioDireito->num_rows() > 0){

                        $rowDireito = $BinarioDireito->row();

                        $this->matrizHTML .= '<li>';

                        $this->matrizHTML .= '<a href="?network_id='.$rowDireito->id_usuario.'"><img src="https://workanatestes.tk/bitcoin.png" border="0" class="tooltipster" title="Nome: '.InformacoesUsuario('nome', $rowDireito->id_usuario).' <br /> Celular: '.InformacoesUsuario('celular', $rowDireito->id_usuario).'" width="50" style="opacity: 1"/></a> <br /><font color="black">'.InformacoesUsuario('nome', $rowDireito->id_usuario).'</font>';

                        $this->CriaDesenhaMatriz($rowDireito->id_usuario, $niveis-1);

                        $this->matrizHTML .= '</li>';
                    }else{

                        $this->matrizHTML .= '<li>';

                        $this->matrizHTML .= '<img src="https://workanatestes.tk/bitcoin.png" width="50" style="opacity: 0.4"/> <br /><font color="black">&nbsp;</font>';

                        $this->CriaDesenhaMatriz(false, $niveis-1);

                        $this->matrizHTML .= '</li>';
                    }
                }
            }

            $this->matrizHTML .= '</ul>';
        }
    }

    public function Matriz($id = false){

        if(!$id || empty($id)){
            $id = $this->userid;
        }

        if($this->ExisteNaRede($id) || $id == $this->userid){

            $this->db->where('id', $id);
            $usuarios = $this->db->get('usuarios');

            if($usuarios->num_rows() > 0){

                $LadoEsquerdo = $this->QuantidadeRede($id, 1);

                $this->contagem = 0;

                $LadoDireito = $this->QuantidadeRede($id, 2);

                $this->matrizHTML .= '<li>';
                $this->matrizHTML .= '<a href="#"><img src="https://workanatestes.tk/bitcoin.png" class="tooltipster" title="Lado esquerdo: '.$LadoEsquerdo.'<br />Lado direito: '.$LadoDireito.'" border="0" width="50" /></a> <br /> <font color="black">'.InformacoesUsuario('nome', $id).'</font>';
                $this->matrizHTML .= $this->CriaDesenhaMatriz($id, 4);
                $this->matrizHTML .= '</li>';

                return $this->matrizHTML;

            }
        }
    }

    public function VoltaNivelAcima($id_usuario){

        if($id_usuario != $this->userid){

            $this->db->where('id_usuario', $id_usuario);
            $rede = $this->db->get('rede');

            if($rede->num_rows() > 0){

                $row = $rede->row();

                return $row->id_patrocinador;
            }

            return false;
        }

        return false;
    }
}
?>
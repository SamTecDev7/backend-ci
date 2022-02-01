<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bankonmodel extends CI_Model {

    protected $userid;
    protected $rede_total = array();
    protected $todos_niveis = array();

    public function __construct() {
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
        $this->token = ConfiguracoesSistema('bankon_token', $this->userid);
        $this->conta = ConfiguracoesSistema('bankon_conta', $this->userid);
    }

    public function ConsultarTransferencias($id, $codigo) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.bankon.com.br/v1/consultas/transferencias/" . $codigo,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authentication: " . $this->token
            ),
        ));

        $json = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {

            $response = json_decode($json);

            if (isset($response->sucesso)) {

                if ($response->sucesso) {

                    if ($response->Dados->destino->usuario == $this->conta) {

                        $this->db->where('id', $id);
                        $this->db->where('status', 0);
                        $fatura = $this->db->get('faturas');

                        if ($fatura->num_rows() > 0) {

                            $fatura = $fatura->row();

                            if ($response->Dados->valor == ($fatura->valor)) {

                                $this->db->where('codigo', $codigo);
                                $comprovantes = $this->db->get('comprovante');

                                if ($comprovantes->num_rows() <= 0) {

                                    $this->db->insert('comprovante', array('codigo' => $codigo));

                                    return $this->clientes_faturas->LiberarFatura($fatura->id, "Bankon");
                                } else {

                                    return '<div class="alert alert-danger text-center">Comprovante de transação já foi adicionado!</div>';
                                }
                            } else {

                                return '<div class="alert alert-danger text-center">O valor da transação não é o mesmo valor da fatura!</div>';
                            }
                        }
                    } else {

                        return '<div class="alert alert-danger text-center">Esta transação não foi feita para a conta definida!</div>';
                    }
                }
            }

            if (isset($response->message) && !empty($response->message)) {
                return '<div class="alert alert-danger text-center">' . $response->message . '</div>';
            }

            return '<div class="alert alert-danger text-center">Falha na comunicação com a Bankon!</div>';
        }
    }

}

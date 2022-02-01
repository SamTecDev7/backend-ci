<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configurpaymodel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('urpaysetup');
    }

    public function getUrpaySetup(){
        $this->db->select();
        $urpay = $this->db->get('urpay_setup');

        if($urpay->num_rows() > 0){

            return $urpay->result();
        }

        return false;

    }

    public function salvarConfig(){
        $save = array();
        $setup = array(
            //'urpay_setup_chave' => urlencode(base64_encode(json_encode($this->input->post())))
            'urpay_hab_api' => $this->input->post('urpay_hab_api'),
            'urpay_user' => $this->input->post('urpay_user'),
            'urpay_token_api_comum' => $this->input->post('urpay_token_api_comum'),
            'urpay_token_api_trans' => $this->input->post('urpay_token_api_trans'),
            'urpay_valor_desconto' => $this->input->post('urpay_valor_desconto'),
            'urpay_valor_mimimo' => $this->input->post('urpay_valor_mimimo'),
            'boleto_urpay' => (null !== $this->input->post('boleto_urpay')) ? $this->input->post('boleto_urpay') : 'NULL',
            'transfer_urpay' => (null !== $this->input->post('transfer_urpay')) ? $this->input->post('transfer_urpay') : 'NULL',
            'transfer_urpay_bank' => (null !== $this->input->post('transfer_urpay_bank')) ? $this->input->post('transfer_urpay_bank') : 'NULL'
        );
        
        $save['urpay_setup_chave'] = encrypt($setup);
        if($this->input->post('urpay_setup_id') == ''){
            $database = $this->db->insert('urpay_setup', $save);
        } else {
            $save['urpay_setup_updated'] = date('Y-m-d H:i:s');
            $this->db->where('urpay_setup_id', $this->input->post('urpay_setup_id'));
            $database = $this->db->update('urpay_setup', $save);
        }
        
            if($database){
                return TRUE;
            } else {
                return FALSE;
            }
        
    }




}
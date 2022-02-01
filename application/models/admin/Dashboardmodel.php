<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    
    public function entradas ($total = false){

        $this->db->select_sum('valor');
        $this->db->where('status', 1);

        $query = $this->db->get('faturas');

        if($query->num_rows() > 0){

            $row = $query->row();

            return number_format($row->valor, 2, ',', '.');
        }

        return 0.00;
    }

    public function TotalRendimento($today = false){

        $this->db->select_sum('valor');
		$this->db->where('lifecoins_v' >= 1);
        $this->db->where('status', 1);
        if($today){
            $this->db->where('data_pagamento', date('Y-m-d'));
        }

        $query = $this->db->get('faturas');

        if($query->num_rows() > 0){

            $row = $query->row();

            return number_format($row->valor, 2, ',', '.');
        }

        return 0.00;
    }

        
}
?>
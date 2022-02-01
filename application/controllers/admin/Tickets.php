<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/ticketsmodel', 'TicketsModel');
    }

    public function index(){
        $data = array();
        
        $data['tickets'] = $this->TicketsModel->TodosTickets();

        $this->template->load('admin/templates/template', 'admin/tickets/tickets', $data);
    }

    public function visualizar($id){

        if($this->input->post('submit')){
            $data['message'] = $this->TicketsModel->ResponderTicket($id);
        }

        $data['tickets'] = $this->TicketsModel->VisualizarTicket($id);

        $this->template->load('admin/templates/template', 'admin/tickets/visualizar', $data);
    }

    public function fechar($id){

        $this->TicketsModel->FecharTicket($id);
    }
}
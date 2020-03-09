<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_Account_Contract extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function func() {
        $this->load->view('pages/Home/Home_page.php');
    }

    public function view_account_contract($data) {
        $this->load->view('pages/Home/includes/view_clients_account_details.php');
    }

    public function display_client_account_details_model($data) {
        echo $data;
    }

    public function request_update_client_account_model($data) {
        echo $data;
    }

    public function message_notification() {
        $this->load->view('pages/Home/includes/message_notification/success.php');
    }
    public function regester_clients_account(){
        $this->load->view('pages/Home/includes/add_clients_account_page.php');
    }
    public function regester_contract_locations_page(){
        $this->load->view("pages/Home/includes/add_contract_location_page");
    }
    public function request_message_notification($data) {
        $this->load->view('pages/Home/includes/message_notification/success_with_data.php', $data);
    }
    public function view_client_contract_locations(){
        $this->load->view('pages/Home/includes/view_client_contract_page.php');
    }
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_data extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function view_all_clients()
	{
		$this->load->view('pages/Clients/Client_page.php');
		
	}
	
        public function display_all_clients(){
            $this->load->view('pages/Clients/includes/view_client_page.php');
        }
        public function display_all_clients_model($data){
            echo $data;
        }
        public function view_clients_detail_empty_page(){
            $this->load->view('pages/Clients/includes/view_clients_details.php');
        }
        public function regester_clients_page(){
            $this->load->view('pages/Clients/includes/add_clients_page.php');
        }
}

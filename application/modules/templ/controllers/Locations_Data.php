<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locations_Data extends MX_Controller {

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
    public function regester_locations_page(){
        $this->load->view("pages/Locations/includes/add_location_page");
    }
    public function message_notification($data){
        $this->load->view("pages/Locations/includes/message_notification/success", $data);
    }
    public function locations_page(){
        $this->load->view("pages/Locations/Locations_page");
    }
    public function view_locations_page(){
        $this->load->view("pages/Locations/includes/View_locations_page");
    }
    public function add_new_location_page(){
        $this->load->view("pages/Locations/includes/add_new_location_page");
    }

}

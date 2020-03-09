<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Messages extends MX_Controller {

    function __construct() {
        parent::__construct();

        
    }

    public function index() {
        //echo modules::run('templ/Locations_Data/Locations_page');
    }

    function request() {
        if ($this->uri->rsegment(3) == "warning") {
            self::request_warning();
        }else if ($this->uri->rsegment(3) == "success") {
            self::request_success();
        }else if ($this->uri->rsegment(3) == "danger") {
            self::request_danger();
        } 
    }
    public function request_success(){
        $status_message['data'] = $this->uri->rsegment(4);
        $status_message['notification_message'] = $this->uri->rsegment(5);
        echo modules::run('templ/Notification_Messages_Data/notification_messages', $status_message);
    }
    
    
     

    

    

    

}

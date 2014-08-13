<?php 

if (! defined('BASEPATH')) {
        exit('No direct script access allowed');
}

session_start();

class Home extends CI_Controller {
        function __construct() {
                parent::__construct();
        }

        function index() {
                $sessData = $this->session->userdata('logged_in');
                $data['username'] = $sessData['username'];
                $data['radios'] = $this->radio->get_all_radios();
                
                $this->load->view('private/home', $data);
        }
}


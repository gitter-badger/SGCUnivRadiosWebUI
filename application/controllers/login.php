<?php 

if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
}

class Login extends CI_Controller {
        function __construct() {
                parent::__construct();
        }

        function index() {
                $this->load->helper(Array('form'));
                $this->load->view('public/login');
        }
}


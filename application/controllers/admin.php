<?php 

if (! defined('BASEPATH')) {
        exit('No direct script access allowed');
}

session_start();

class Admin extends CI_Controller {
        function __construct() {
                parent::__construct();
            
                $this->load->model('user');
                if ($this->user->get_user_role($this->session->userdata('logged_in')['username'])[0]->role > 1) {
                        header('location: '.base_url());
                }
        }

        function index() {
                $sessData = $this->session->userdata('logged_in');
                $data['username'] = $sessData['username'];

                $this->load->helper(array('form'));

                // General tab
                // Users tab
                $data['users'] = $this->user->get_all_users();
                // Radios tab
                
                $this->load->view('private/admin/index', $data);
        }
}


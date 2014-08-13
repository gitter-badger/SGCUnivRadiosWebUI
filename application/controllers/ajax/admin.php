<?php 

if (! defined('BASEPATH')) {
        exit('No direct script access allowed');
}

session_start();

class Admin extends CI_Controller {
        function __construct() {
                parent::__construct();
            
                $this->load->model('user');
        }

        function user($coupleActionId = null) {
                if ($this->user->get_user_role($this->session->userdata('logged_in')['username'])[0]->role != 0 || !$this->input->is_ajax_request()) {
                        print(json_encode(array('RC' => '1')));
                } else {
                        if (is_null($coupleActionId) || (!preg_match('/^(load|rem):([0-9]{1,})$/', $coupleActionId, $out) && !preg_match('/^(new)$/', $coupleActionId, $out))) {
                                print(json_encode(array('RC' => '1')));
                        } else {
                                if (count($out) == 2 || count($out) == 3) {
                                        switch ($out[1]) {
                                                case 'new':
                                                        print('new');
                                                break;
                                                case 'load':
                                                        if (isset($out[2]) && is_numeric($out[2])) {
                                                                $user = $this->user->get_user_by_id($out[2]);
                                                                print(json_encode(array('username' => $user[0]->username, 'role' => $user[0]->role)));
                                                        } else {
                                                                print(json_encode(array('RC' => '331')));
                                                        }
                                                break;
                                                case 'rem':
                                                        print('rem');
                                                break;
                                        }
                                } else {
                                        print(json_encode(array('RC' => '1')));
                                }
                        }
                }
        }
}


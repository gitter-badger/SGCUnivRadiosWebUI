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
                if ($this->user->get_user_role($this->session->userdata('logged_in')['username'])[0]->role > 0 || !$this->input->is_ajax_request()) {
                        print(json_encode(array('rc' => '1', 'rcMsg' => 'You\'re not an admin user')));
                } else {
                        if (is_null($coupleActionId) || (!preg_match('/^(load|rem):([0-9]{1,})$/', $coupleActionId, $out) && !preg_match('/^(new)$/', $coupleActionId, $out) && !preg_match('/^(save)$/', $coupleActionId, $out))) {
                                print(json_encode(array('rc' => '1', 'rcMsg' => 'Unknown action')));
                        } else {
                                switch ($out[1]) {
                                        case 'new':
                                                print('new');
                                        break;
                                        case 'load':
                                                if (isset($out[2]) && is_numeric($out[2])) {
                                                        $user = $this->user->get_user_by_id($out[2]);
                                                        $nbAdmins = $this->user->count_admins();

                                                        print(json_encode(array('rc' => '0', 'rcMsg' => 'OK', 'username' => $user[0]->username, 'role' => $user[0]->role, 'nbAdmins' => $nbAdmins)));
                                                } else {
                                                        print(json_encode(array('rc' => '1', 'rcMsg' => 'Id should be a numeric value')));
                                                }
                                        break;
                                        case 'rem':
                                                print('rem');
                                        break;
                                        case 'save':
                                                $formValidation = TRUE;
                                                $userId = $this->input->post('ID');
                                                $username = trim($this->input->post('username'));
                                                $password = $this->input->post('password');
                                                $passwordconf = $this->input->post('passwordconf');
                                                $role = $this->input->post('role');

                                                if (empty($username)) {
                                                        $formValidation = FALSE;
                                                } else {
                                                        if (!empty($password) && !empty($passwordconf)) {
                                                                if ($password != $passwordconf) {
                                                                        $formValidation = FALSE;
                                                                }
                                                        }
                                                }

                                                if ($formValidation) {
                                                        if ($this->user->save_existing_user($userId, $username, $password, $role)) {
                                                                $userData = $this->session->userdata('logged_in');
                                                                $userData['username'] = $username;
                                                                $this->session->set_userdata('logged_in', $userData);
                                                                print(json_encode(array('rc' => '0', 'rcMsg' => 'OK')));
                                                        } else {
                                                                print(json_encode(array('rc' => '1', 'rcMsg' => 'An error occured while validating the form')));
                                                        }
                                                } else {
                                                        print(json_encode(array('rc' => '1', 'rcMsg' => 'An error occured while validating the form')));
                                                }
                                        break;
                                }
                        }
                }
        }
}


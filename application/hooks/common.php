<?php

if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
}

class common {
        function check_user_session() {
                $ci =& get_instance();
                $ci->load->library('session');
                
                if (!$ci->session->userdata('logged_in')) {
                        if (strcmp($ci->uri->segment(1), 'login') != 0 && strcmp($ci->uri->segment(1), 'verifylogin') != 0) {
                                header('location: '.$ci->config->item('base_url').'login');
                        }
                } else {
                        if (strcmp($ci->uri->segment(1), 'login') == 0 || strcmp($ci->uri->segment(1), 'verifylogin') == 0 || strcmp($ci->uri->segment(1), '') == 0) {
                                header('Location: '.$ci->config->item('base_url').'home');
                        }
                }
        }

        function display_header() {
                $ci =& get_instance();
                $ci->load->model('user');
                $ci->load->model('radio');

                if (!$ci->input->is_ajax_request() && $ci->router->class != 'listen') {
                        $data = Array(
                                'loggedIn' => $ci->session->userdata('logged_in'),
                                'currentPage' => $ci->uri->segment(1),
                                'currentAction' => $ci->uri->segment(2),
                                'radios' => $ci->radio->get_all_radios()
                        );

                        if ($data['loggedIn']) {
                                $data['currentRole'] = $ci->user->get_user_role($ci->session->userdata('logged_in')['username'])[0]->role;
                                $ci->load->view('private/common/header', $data);
                        } else {
                                $ci->load->view('public/common/header', $data);
                        }
                }
        }

        function display_footer() {
                $ci =& get_instance();

                if (!$ci->input->is_ajax_request() && $ci->router->class != 'listen') {
                        if ($ci->session->userdata('logged_in')) {
                                $ci->load->view('private/common/footer');
                        } else {
                                $ci->load->view('public/common/footer');
                        }
                }
        }
}

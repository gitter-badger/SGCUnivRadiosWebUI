<?php 

if (! defined('BASEPATH')) {
        exit('No direct script access allowed');
}

session_start();

class Listen extends CI_Controller {
        function __construct() {
                parent::__construct();

                $this->load->model('radio', '', TRUE);
        }

        function index($radio = null) {
                $data = array();

                if (!is_null($radio)) {
                        $radioObj = $this->radio->get_radio_by_url($radio)[0];

                        if ($radioObj !== FALSE) {
                                $data['radio_url'] = base_url('live/'.$radioObj->radio_mountpoint);
                                $data['radio_mountpoint'] = $radioObj->radio_mountpoint;
                        }
                        $this->load->view('private/player', $data);
                }
        }

        function currentsong($radio = null) {
                if (!is_null($radio) && $this->input->is_ajax_request()) {
                        $logFile = $this->config->item('pl_log_file');
                        preg_match_all("/^.*|(.*)$/", `tail -15 $logFile | grep $radio`, $out);

                        $out = array_filter($out[1]);
                        $keys = array_keys($out);

                        foreach ($keys as $key) {
                                if (strlen($out[$key]) != 0) {
                                        $out = $out[$key];
                                        break;
                                }
                        }
                        $out = array_reverse(explode('|', $out))[0];
                        print(json_encode(array('track' => $out)));
                } else {
                        print(json_encode(array('track' => 'Unable to find song title')));
                }
        }
}


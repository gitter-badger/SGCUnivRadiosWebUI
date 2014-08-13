<?php

if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
}

if (!function_exists('site_title')) {
        function site_title() {
                $ci =& get_instance();
                return $ci->config->item('site_title');
        }
}

if (!function_exists('site_description')) {
        function site_description() {
                $ci =& get_instance();
                return $ci->config->item('site_description');
        }
}


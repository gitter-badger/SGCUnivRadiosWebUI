<?php

if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
}

$hook['post_controller_constructor'][] = array(
        'class' => 'common',
        'function' => 'check_user_session',
        'filename' => 'common.php',
        'filepath' => 'hooks',
        'params' => array()
);

$hook['post_controller_constructor'][] = array(
        'class' => 'common',
        'function' => 'display_header',
        'filename' => 'common.php',
        'filepath' => 'hooks',
        'params' => array()
);

$hook['post_controller'] = array(
        'class' => 'common',
        'function' => 'display_footer',
        'filename' => 'common.php',
        'filepath' => 'hooks',
        'params' => array()
);


<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends MY_Controller {

    public function index() {
        $this->user_manager->admin_authenticate();
        $this->load('admin_layout', 'admin/dashboard');
    }

}
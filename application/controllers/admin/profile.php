<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }

    public function index() {
        $admin = $this->session->userdata('admin');
        if ($this->input->post()) {
            $posts = $this->input->post();
            if (trim($posts['ad_fullname']) != '') {
                $data['ad_fullname'] = trim($posts['ad_fullname']);
                if (trim($posts['pass'])) {
                    $data['password'] = trim(md5($posts['pass']));
                }
                $this->load->model('admin_model');
                $this->admin_model->update($data, $admin['ad_id']);
                $this->data['success'] = 'Update success!';
            } else {
                $this->data['errors'] = 'Update unsucess!';
            }
        }
        $this->data['breadcrumbs'][] = array('title' => 'Profile');
        $this->data['title'] = 'Profile';
        $this->data['admin'] = $admin;
        $this->load('admin_layout', 'admin/profile/index');
    }

}

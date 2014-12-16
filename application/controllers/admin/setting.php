<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller {

    private $data;
    
    public function __construct() {
        parent::__construct();
        $this->user_manager->admin_authenticate();
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Setting');
        $this->load->model('options_model', 'options');
        $options = $this->options->lists();
        $optionList = array();
        foreach ($options as $option) {
            $optionList[$option['key']] = unserialize($option['value']);
        }

        $posts = $this->input->post();
        if (!empty($posts)) {
            foreach ($posts['options'] as $key => $option) {
                $this->options->update($option, $key);
            }
            $optionList = $posts['options'];
            $this->data['msg_status'] = 'success';
            $this->data['msg'] = 'Update Success!';
        }
        $this->data['options'] = $optionList;
        $this->load('admin_layout', 'admin/setting');
    }

}

?>

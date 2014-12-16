<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Features extends MY_Controller {

    public function index() {
        $this->load->model('features_model');
        $dataWhere = '(page = 1 AND status =1)';
        $order = 'order';
        $features = $this->features_model->listFeatures($dataWhere, null, '*', 4, 0, $order);
        $this->data['features'] = $features;
        $this->load('front_layout', 'features');
    }

 function contactPage() {
        $posts = $this->input->post();
        if ($posts) {
            $data = $posts;
            $validate = $this->setting_manager->contactValidate($data);
            if (empty($validate)) {
                $dataUpdate['name'] = $data['name'];
                $dataUpdate['email'] = $data['email'];
                $dataUpdate['phone'] = $data['phone'];
                $dataUpdate['content'] = $data['content'];
                $id = $this->features->insert($dataUpdate);
                $this->session->set_flashdata('success', 'Your Mail has been sent successfully');
                redirect('features/contactPage');
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->load('front_layout', 'contact');
    }


    public function aboutPage() {
//        $this->user_manager->authenticate();
        $this->load->model('features_model');
        $dataWhere = '(page = 2 AND status =1)';
        $order = 'order';
        $features = $this->features_model->listFeatures($dataWhere, null, '*', 4, 0, $order);
        $this->data['features'] = $features;
        $this->load('front_layout', 'aboutpage');
    }


}

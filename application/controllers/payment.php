<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $controller = $this->router->fetch_class();
        $action = $this->router->fetch_method();
        $this->user_manager->retaurant_authenticate(mybase64_encode($controller . '/' . $action));
    }

    public function createPayment() {
        $this->load('front_layout', 'payment/payment');
    }

    public function mobilePayment() {
        $tmp = $this->session->flashdata('success'); 
        var_dump($tmp);
    }

    public function pmPayment() {
        $tmp = $this->session->flashdata('success');
        $this->data['data'] = $tmp['data'];
        $this->data['link_submit'] = $tmp['link_submit'];
        $this->load('front_layout', 'payment/pm_payment');
    }

    public function otherPayment() {
        $tmp = $this->session->flashdata('success');
        $this->data['other'] = $tmp;
        $this->load('front_layout', 'payment/other_payment');
    }

}

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

    public function success() {
        $this->load('front_layout','payment/mobile_payment');
    }

    public function mobilePayment() {
        $this->load->model('deposit_logs_model');
        $tmp = $this->session->flashdata('success');
        if (!empty($tmp)) {
            $dataInsert = array();
            $dataInsert = array(
                'user_id' => $this->auth['us_id'],
                'payment' => 'mobile',
                'rate' => '0.5',
                'amount' => $tmp->m_RESPONSEAMOUNT,
                'coins' => $tmp->m_RESPONSEAMOUNT * 0.5,
                'transaction_id' => $tmp->m_TRANSID,
                'currency' => 'VND',
            );
            $this->deposit_logs_model->insert($dataInsert);
        }
        $this->data["tmp"] = $tmp;
        $this->load('front_layout', 'payment/mobile_payment');
    }

    public function pmPayment() {
        $tmp = $this->session->flashdata('success');
        $this->data['data'] = $tmp['data'];
        $this->data['us_id'] = $this->auth['us_id'];
        $this->data['link_submit'] = $tmp['link_submit'];
        $this->load('front_layout', 'payment/pm_payment');
    }

    public function otherPayment() {
        $tmp = $this->session->flashdata('success');
        $this->data['other'] = $tmp;
        $this->load('front_layout', 'payment/other_payment');
    }

}

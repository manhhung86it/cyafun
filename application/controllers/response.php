<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Response extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $controller = $this->router->fetch_class();
        $action = $this->router->fetch_method();
    }

    public function mobile() {
        $dataResult['success'] = 12;
        $dataResult['message'] = 'Success';
        $dataResult['data'] = array(
            'nextstep' => 3,
            'coin_amount' => 1000,
            'paid' => '100000',
            'paid_curency' => 'VND',
            'rate' => '0.5'
        );
        $this->session->set_flashdata('success',$dataResult);
        echo json_encode($dataResult);
    }
    public function pm() {
        $dataResult['success'] = 1;
        $dataResult['message'] = 'Success';
        $dataResult['data'] = array(
            'nextstep' => 2,
            'coin_amount' => 1000,
            'paid' => '100000',
            'paid_curency' => 'VND',
            'rate' => '0.5',
        );  
        $dataResult['link_submit'] = 'cya';
        $this->session->set_flashdata('success',$dataResult);
        //luu session phai co them link_submit
        echo json_encode($dataResult);
    }
    public function other() {
        $dataResult['success'] = 1;
        echo json_encode($dataResult);
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once("nap_the/libs/nusoap.php");
include_once('nap_the/entries.php');

class Response extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $controller = $this->router->fetch_class();
        $action = $this->router->fetch_method();
    }

    public function mobile() {
        $number = $this->input->post('number');
        $serial = $this->input->post('serial');
        $supplier = $this->input->post('supplier');
        $this->load->model('payment_model');
        $this->load->model('payment_options_model');
        $dataWhere['payment_code'] = 'mobile';
        $paymentId = $this->payment_model->getPayment($dataWhere);
        $dataPaymentOptions = $this->payment_options_model->getPaymentOptionsById($paymentId[0]->id);
        $dataPaymentOptionsReturn = array();
        foreach ($dataPaymentOptions as $key => $value) {
            $dataPaymentOptionsReturn[$value->option_code] = $value->value;
        }
        $pin = $number;
        $pin = str_replace('-', '', $pin);
        $pin = str_replace(' ', '', $pin);
        $serial = $serial;
        $serial = str_replace('-', '', $serial);
        $serial = str_replace(' ', '', $serial);
        $serviceProvider = $supplier;

        $webservice = $dataPaymentOptionsReturn['link'];
        $soapClient = new SoapClient(null, array('location' => $webservice, 'uri' => $dataPaymentOptionsReturn['uri']));

        $CardCharging = new CardCharging();
        $CardCharging->m_UserName = $dataPaymentOptionsReturn['m_UserName'];
        $CardCharging->m_PartnerID = $dataPaymentOptionsReturn['m_PartnerID'];
        $CardCharging->m_MPIN = $dataPaymentOptionsReturn['m_MPIN'];
        $CardCharging->m_Target = $dataPaymentOptionsReturn['m_Target'];
        $CardCharging->m_Card_DATA = $serial . ":" . $pin . ":" . "0" . ":" . $serviceProvider;
        $CardCharging->m_SessionID = "";
        $CardCharging->m_Pass = $dataPaymentOptionsReturn['m_Pass'];
        $CardCharging->soapClient = $soapClient;
        $transid = '00368' . date("YmdHms"); //gen transaction id
        $CardCharging->m_TransID = $transid;

        $CardChargingResponse = new CardChargingResponse();
        $CardChargingResponse = $CardCharging->CardCharging_();

//        var_dump($CardChargingResponse) . '<br>';
        //echo $CardChargingResponse->m_RESPONSEAMOUNT.'<br>';
        //echo $CardChargingResponse->m_TRANSID.'<br>';

        $this->session->set_flashdata('success', $CardChargingResponse);
        echo json_encode($CardChargingResponse);
    }

    public function pm() {
        $number = $this->input->post('number');
        $dataResult['success'] = 1;
        $dataResult['message'] = 'Success';
        $dataResult['data'] = array(
            'nextstep' => 2,
            'coin_amount' => $number,
        );
        $dataResult['link_submit'] = 'cya';
        $this->session->set_flashdata('success', $dataResult);
        //luu session phai co them link_submit
        echo json_encode($dataResult);
    }

    public function other() {
        $dataResult['success'] = 1;
        echo json_encode($dataResult);
    }

}

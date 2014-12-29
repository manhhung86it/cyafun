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
        $dataResult['success'] = 12;
        $dataResult['message'] = 'Success';
        $dataResult['data'] = array(
            'nextstep' => 3,
            'coin_amount' => 1000,
            'paid' => '100000',
            'paid_curency' => 'VND',
            'rate' => '0.5'
        );
        
        $pin = '123456789';
        $pin = str_replace('-', '', $pin);
        $pin = str_replace(' ', '', $pin);
        $serial = '12345678912';
        $serial = str_replace('-', '', $serial);
        $serial = str_replace(' ', '', $serial);
        $serviceProvider = 'VNP';

        $webservice = "http://charging-service.megapay.net.vn/CardChargingGW_V2.0/services/Services?wsdl";
        $soapClient = new SoapClient(null, array('location' => $webservice, 'uri' => "http://113.161.78.134/VNPTEPAY/"));

        $CardCharging = new CardCharging();
        $CardCharging->m_UserName = 'kh00015';
        $CardCharging->m_PartnerID = 'kh0015';
        $CardCharging->m_MPIN = 'zykqfrlwz';
        $CardCharging->m_Target = 'useraccount1';
        $CardCharging->m_Card_DATA = $serial . ":" . $pin . ":" . "0" . ":" . $serviceProvider;
        $CardCharging->m_SessionID = "";
        $CardCharging->m_Pass = 'fzdvoalqz';
        $CardCharging->soapClient = $soapClient;
        $transid = '00368' . date("YmdHms"); //gen transaction id
        $CardCharging->m_TransID = $transid;

        $CardChargingResponse = new CardChargingResponse();
        $CardChargingResponse = $CardCharging->CardCharging_();
        
        var_dump($CardChargingResponse).'<br>';
        //echo $CardChargingResponse->m_RESPONSEAMOUNT.'<br>';
        //echo $CardChargingResponse->m_TRANSID.'<br>';
        
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

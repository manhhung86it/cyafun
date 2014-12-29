<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once("nap_the/libs/nusoap.php");
include_once('nap_the/entries.php');

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
        
        echo $CardChargingResponse->m_Status.'<br>';
        echo $CardChargingResponse->m_RESPONSEAMOUNT.'<br>';
        echo $CardChargingResponse->m_TRANSID.'<br>';
        

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

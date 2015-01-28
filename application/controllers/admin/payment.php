<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }

    public function index() {

        $this->load->model('payment_model');

        $this->data['success'] = $this->session->flashdata('success');

        $this->data['breadcrumbs'][] = array('title' => 'payment');

        $this->data['payments'] = $this->payment_model->getPayment();

        $this->load('admin_layout', 'admin/payment/index');
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => site_url('admin/payment'), 'title' => 'payment manager');
        $this->data['breadcrumbs'][] = array('title' => 'Edit');
        $this->load->model('payment_model');
        $this->load->model('payment_options_model');
        $this->load->library('setting_manager');
        $payment = $this->payment_model->getPaymentById($id);
        $this->data['title'] = 'Add new';
        $paymentOptions = $this->payment_options_model->getPaymentOptionsById($id);
        $dataPaymentOption = array();
        if ($paymentOptions) {
            foreach ($paymentOptions as $paymentOption) {
                $dataPaymentOption[$paymentOption->option_code] = $paymentOption->value;
            }
        }


        $dataPayment = array();
        if ($payment) {
            $dataPayment['id'] = $payment['id'];
            $dataPayment['payment_code'] = $payment['payment_code'];
            $dataPayment['payment_name'] = $payment['payment_name'];
            $dataPayment['payment_rate'] = $payment['payment_rate'];
            $dataPayment['payment_currency'] = $payment['payment_currency'];
            $dataPayment['payment_status'] = $payment['payment_status'];
            $this->data['title'] = 'Update Payment';
        }
        $data = $this->input->post();
        if (isset($_POST['submit_information'])) {
            $dataInsert = $this->input->post();
            $validate = $this->setting_manager->paymentValidate($dataInsert);
            $dataPayment['payment_code'] = $dataInsert['code'];
            $dataPayment['payment_name'] = $dataInsert['name'];
            $dataPayment['payment_rate'] = $dataInsert['rate'];
            $dataPayment['payment_currency'] = $dataInsert['currency'];
            $dataPayment['payment_status'] = !empty($dataInsert['status']) ? 1 : 0;
            if (empty($validate)) {
                if ($payment) {
                    $this->payment_model->update($dataPayment, $id);
                    $this->session->set_flashdata('success', 'Update Infomations success');
                    redirect('admin/payment');
                } else {
                    $this->payment_model->insert($dataPayment);
                    $this->session->set_flashdata('success', 'Add Infomations success');
                    redirect('admin/payment');
                }
            } else {
                $this->data['errors'] = $validate;
            }
        }

        if (isset($_POST['submit_option'])) {
            $dataInsertOptions = $this->input->post();
            var_dump($dataInsertOptions);
            $this->payment_options_model->deleteByPayment($id);
            foreach ($dataInsertOptions as $key => $value) {
                if ($key != 'submit_option') {
                    $insertOption['payment_id'] = $id;
                    $insertOption['option_code'] = $key;
                    $insertOption['value'] = $value;
                    $this->payment_options_model->insert($insertOption, $id);
                }
            }
            $this->session->set_flashdata('success', 'Update Options success');
            redirect('admin/payment');
        }
        $this->data['paymentOptions'] = $dataPaymentOption;
        $this->data['payment'] = $dataPayment;
        $this->load('admin_layout', 'admin/payment/update');
    }

}

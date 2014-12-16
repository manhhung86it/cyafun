<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->user_manager->admin_authenticate();
    }

    public function index() {
        $this->load->model('email_templates_model');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['breadcrumbs'][] = array('title' => 'Email template');
        $this->data['emails'] = $this->email_templates_model->listTemplates();
        $this->load('admin_layout', 'admin/email/index');
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => site_url('admin/email'), 'title' => 'Email template');
        $this->data['breadcrumbs'][] = array('title' => 'Edit');
        $this->load->model('email_templates_model');
        $this->load->library('setting_manager');
        $email = $this->email_templates_model->getTemplateById($id);
        $this->data['title'] = 'Add new email template';
        $dataEmail = array();
        if ($email) {
            $dataEmail['key'] = $email['key'];
            $dataEmail['subject'] = $email['subject'];
            $dataEmail['content'] = $email['content'];
            $this->data['title'] = 'Update email template';
        }
        if ($this->input->post()) {
            $dataEmail = $this->input->post();
            $validate = $this->setting_manager->emailTmpValidate($dataEmail, $id);
            if (empty($validate)) {
                if ($email) {
                    $this->email_templates_model->update($dataEmail, $id);
                    $this->session->set_flashdata('success', 'Update email success');
                    redirect('admin/email');
                } else {
                    $this->email_templates_model->insert($dataEmail);
                    $this->session->set_flashdata('success', 'Add new email success');
                    redirect('admin/email');
                }
            }else{
                $this->data['errors'] = $validate;
            }
        }
        $this->data['email'] = $dataEmail;
        $this->load('admin_layout', 'admin/email/update');
    }

}
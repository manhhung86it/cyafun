<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends MY_Controller {

    public function index() {
//        $this->user_manager->authenticate();
        $this->load->model('contact_model', 'contact');
        $contact = $this->contact->getContactPages(3);
        $dataContact = array(
            'content' => $contact['content'],
            'title' => $contact['title'],
        );
        $posts = $this->input->post();
        if ($posts) {
            $this->load->library('setting_manager');
            $this->load->helper('date');
            $this->load->model('contact_model', 'contact');
            $this->load->library('mail');
            $this->config->load('email', TRUE);
            $data = $posts;
            $validate = $this->setting_manager->contactValidate($data);
            if (empty($validate)) {
                $reply = 0;
                $to_add = array(
                    "name" => $data['name'],
                    "email" => $data['email'],
                    "phone" => $data['phone'],
                    "message" => $data['content'],
                    "date_add" => date('Y-m-d H:i:s', now()),
                    "reply" => $reply
                );
                $insert = $this->contact->insert($to_add);
                $mailTo['name'] = $data['name'];
                $mailTo['email'] = $this->config->item('email_contact_from', 'email');
                $dataEmail['email'] = $data['email'];
                $dataEmail['name'] = $data['name'];
                $dataEmail['phone'] = $data['phone'];
                $dataEmail['content'] = $data['content'];
                sentMailTemp($mailTo, 'contact', $dataEmail);

                $this->data['success'] = 'Your Mail has been sent successfully';
                redirect('contact/index');
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['contact'] = $dataContact;
        $this->load('front_layout', 'contact');
    }

    public function viewContacts() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/contacts/contact');
    }

    public function ajax_list_contact() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('contact_model', 'contact');
        $dataWhere = '';
        if (!empty($search)) {
            $dataWhere .= "(id  like '%{$search}%' or name  like '%{$search}%'  or email  like '%{$search}%'  or message  like '%{$search}%')";
        }

        $frontends = $this->contact->listContact($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalFrontend = $this->contact->totalContact($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalFrontend,
            'iTotalDisplayRecords' => $totalFrontend,
        );
        $jsonArray['aaData'] = array();
        foreach ($frontends as $frontend) {
            $data = array(
                'id' => $frontend['id'],
                'name' => $frontend['name'],
                'email' => $frontend['email'],
                'phone' => $frontend['phone'],
                'message' => $frontend['message'],
                'reply' => $frontend['reply'],
                'date_add' => $frontend['date_add'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

    public function editContactsPage() {
        $this->load->model('contact_model', 'contact');
        $this->load->library('setting_manager');
        $dataContact = array();
        $contact = $this->contact->getContactPages(3);
        $dataContact = array(
            'id' => $contact['id'],
            'page' => $contact['page'],
            'status' => $contact['status'],
            'image' => $contact['image'],
            'content' => $contact['content'],
            'order' => $contact['order'],
            'title' => $contact['title'],
        );
        $posts = $this->input->post();
        if ($posts) {
            $dataContact = $posts;
            $validate = $this->setting_manager->contactPageValidate($dataContact);
            if (empty($validate)) {
                $dataUpdate['content'] = $dataContact['content'];
                $dataUpdate['title'] = $dataContact['title'];
                $this->contact->updateContactPage($dataUpdate, 3);
                $this->data['success'] = 'Update Contact Page success';
                redirect('contact/editContactsPage');
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['contact'] = $dataContact;
        $this->load('front_layout', 'manager/update_contactPage');
    }

}

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

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Owners extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }

    public function index() {

        $this->load->model('user_model');

        $this->data['success'] = $this->session->flashdata('success');

        $this->data['breadcrumbs'][] = array('title' => 'Owner');
        $datauser = array('parent_id' => 0);
        $this->data['users'] = $this->user_model->listUsers($datauser);
        $this->load('admin_layout', 'admin/owners/index');
    }

    public function update($id = 0) {

        $this->data['breadcrumbs'][] = array('link' => site_url('admin/owners'), 'title' => 'owners manager');

        $this->data['breadcrumbs'][] = array('title' => 'Edit');

        $this->load->model('user_model');
        $this->load->library('user_manager');

        $user = $this->user_model->getUserById($id);
        $this->data['title'] = 'Add new Owner';
        $dataUser = array();

        if ($user) {
            $dataUser['id'] = $user['id'];
            $dataUser['parent_id'] = $user['parent_id'];
            $dataUser['password'] = $user['password'];
            $dataUser['firstname'] = $user['firstname'];
            $dataUser['lastname'] = $user['lastname'];
            $dataUser['email'] = $user['email'];
            $dataUser['phone'] = $user['phone'];
            $dataUser['date_added'] = $user['date_added'];
            $dataUser['date_modified'] = $user['date_modified'];
            $dataUser['active'] = $user['active'];
            $dataUser['redirect_submit_order'] = $user['redirect_submit_order'];
            $this->data['title'] = 'Update Owner';
        }

        if ($this->input->post()) {

            $dataUser = $this->input->post();
            $dataUser['active'] = !empty($posts['active']) ? 1 : 0;
            $dataUser['redirect_submit_order'] = !empty($posts['redirect_submit_order']) ? 1 : 0;
//            var_dump($dataRestaurant);die();
            $validate = $this->user_manager->userCreateValidate($dataUser, $id);

            if (empty($validate)) {

                if ($user) {

                    $dataUserUpdate = array(
                        'firstname' => $dataUser['firstname'],
                        'lastname' => $dataUser['lastname'],
                        'email' => $dataUser['email'],
                        'phone' => $dataUser['phone'],
                        'active' => $dataUser['active'],
                        'redirect_submit_order' => $dataUser['redirect_submit_order'],
                    );
                    if (!empty($dataUser['password'])) {
                        $dataUserUpdate['password'] = md5($dataUser['password']);
                    }
                    
                    $this->user_model->update($dataUserUpdate, $id);

                    $this->session->set_flashdata('success', 'Update Restaurant success');

                    redirect('admin/owners');
                } else {
                    $dataUserInsert = array(
                        'firstname' => $dataUser['firstname'],
                        'lastname' => $dataUser['lastname'],
                        'email' => $dataUser['email'],
                        'phone' => $dataUser['phone'],
                        'active' => $dataUser['active'],
                        'password' => md5($dataUser['password']),
                        'parent_id' => 0,
                        'redirect_submit_order' => $dataUser['redirect_submit_order'],
                    );
                    $this->user_model->insert($dataUserInsert);

                    $this->session->set_flashdata('success', 'Add new owner success');

                    redirect('admin/owners');
                }
            } else {

                $this->data['errors'] = $validate;
            }
        }
        $this->data['users'] = $dataUser;

        $this->load('admin_layout', 'admin/owners/update');
    }

}

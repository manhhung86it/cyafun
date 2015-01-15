<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_admin extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }
    public function users() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/user_admin/users');
    }

    public function ajax_list_user() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('admin_model');
        $dataWhere = null;
        if (!empty($search)) {
            $dataWhere = "(us_username  like '%{$search}%' or us_name_display  like '%{$search}%' or us_email  like '%{$search}%')";
        }

        $users = $this->admin_model->listUsers($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalUsers = $this->admin_model->totalUsers($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalUsers,
            'iTotalDisplayRecords' => $totalUsers,
        );
        $jsonArray['aaData'] = array();
        foreach ($users as $user) {
            $data = array(
                'ad_id' => $user['ad_id'],
                'ad_username' => $user['ad_username'],
                'ad_fullname' => $user['ad_fullname'],
                'ad_email' => $user['ad_email'],
                'ad_group' => $user['ad_group'],
                'ad_password' => $user['ad_password'],
                'ad_date_created' => $user['ad_date_created'],
                'ad_status' => $user['ad_status'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }
        echo json_encode($jsonArray);
    }

    public function update_user($id = 0) {
        $this->load->model('admin_model');
        $this->load->library('user_manager');
        $dataSupplier = array();
        $dataUser = array();
        if ($id != 0) {
            $datauser = array(
                'ad_id' => $id,
            );
            $user = $this->admin_model->getUser($datauser);
            if (empty($user))
                redirect('admin/user_admin/update_user');
            $dataUser = array(
                'ad_username' => $user['ad_username'],
                'ad_fullname' => $user['ad_fullname'],
                'ad_email' => $user['ad_email'],
                'ad_group' => $user['ad_group'],
                'ad_password' => $user['ad_password'],
                'ad_date_created' => $user['ad_date_created'],
                'ad_status' => $user['ad_status']
            );
        }
        $posts = $this->input->post();
        if ($posts) {
            $dataUser = $posts;
            $dataUser['ad_status'] = !empty($posts['ad_status']) ? 1 : 0;
            $validate = $this->user_manager->userAdminValidate($dataUser, $id);
            if (empty($validate)) {
                if (!empty($id)) {
                    $dataUserUpdate = array(
                        'ad_username' => $dataUser['ad_username'],
                        'ad_fullname' => $dataUser['ad_fullname'],
                        'ad_email' => $dataUser['ad_email'],
                        'ad_group' => $dataUser['ad_group'],
                    );
                    $dataUserUpdate['ad_status'] = $dataUser['ad_status'];
                    if (!empty($dataUser['ad_password'])) {
                        $dataUserUpdate['ad_password'] = md5($dataUser['ad_password']);
                    }
                    $this->data['type_page'] = 1;
                    $this->admin_model->update($dataUserUpdate, $id);
                    $this->session->set_flashdata('success', 'Update user success');
                    redirect('admin/user_admin/users');
                } else {
                    $dataUserInsert = array(
                        'ad_username' => $dataUser['ad_username'],
                        'ad_fullname' => $dataUser['ad_fullname'],
                        'ad_email' => $dataUser['ad_email'],
                        'ad_group' => $dataUser['ad_group'],
                        'ad_status' => $dataUser['ad_status'],
                        'ad_password' => md5($dataUser['ad_password']),
                    );
                    $dataUserInsert['ad_status'] = $dataUser['ad_status'];
                    $this->data['type_page'] = 2;
                    $this->admin_model->insert($dataUserInsert);
                    $this->session->set_flashdata('success', 'Insert user success');
                    redirect('admin/user_admin/users');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['user'] = $dataUser;
        $this->load('admin_layout', 'admin/user_admin/update_user');
    }

    public function delete_user() {
        $this->load->model('admin_model');
        $id = $this->input->post('ad_id');
        if (!empty($id)) {
            $dataDelete = array(
                'ad_id' => $id
            );
            $this->admin_model->delete($dataDelete);
        }
    }

}

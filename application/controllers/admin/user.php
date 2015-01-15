<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }
    public function users() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/user/users');
    }

    public function ajax_list_user() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('user_model', 'user');

        $dataWhere = null;
        if (!empty($search)) {
            $dataWhere = "(us_username  like '%{$search}%' or us_name_display  like '%{$search}%' or us_email  like '%{$search}%')";
        }

        $users = $this->user->listUsers($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalUsers = $this->user->totalUsers($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalUsers,
            'iTotalDisplayRecords' => $totalUsers,
        );
        $jsonArray['aaData'] = array();
        foreach ($users as $user) {
            $data = array(
                'us_id' => $user['us_id'],
                'us_username' => $user['us_username'],
                'us_name_display' => $user['us_name_display'],
                'us_fullname' => $user['us_fullname'],
                'us_email' => $user['us_email'],
                'us_balance' => $user['us_balance'],
                'us_avatar' => $user['us_avatar'],
                'us_password' => $user['us_password'],
                'us_date_created' => $user['us_date_created'],
                'us_status' => $user['us_status'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }
        echo json_encode($jsonArray);
    }

    public function update_user($id = 0) {
        $this->load->model('user_model', 'user');
        $this->load->library('user_manager');
        $dataSupplier = array();
        $dataUser = array();
        if ($id != 0) {
            $datauser = array(
                'us_id' => $id,
            );
            $user = $this->user->getUser($datauser);
            if (empty($user))
                redirect('admin/user/update_user');
            $dataUser = array(
                'us_username' => $user['us_username'],
                'us_name_display' => $user['us_name_display'],
                'us_fullname' => $user['us_fullname'],
                'us_email' => $user['us_email'],
                'us_balance' => $user['us_balance'],
                'us_avatar' => $user['us_avatar'],
                'us_password' => $user['us_password'],
                'us_date_created' => $user['us_date_created'],
                'us_status' => $user['us_status']
            );
        }
        $posts = $this->input->post();
        $dir = PUBLICPATH . '/upload/';
        if ($posts) {
            $dataUser = $posts;
            $dataUser['us_status'] = !empty($posts['us_status']) ? 1 : 0;
            $file = $_FILES['us_avatar'];
            if (!empty($file))
                $tmp_name = $file["tmp_name"];
            $validate = $this->user_manager->userCreateValidate($dataUser, $id, $file);
            if (empty($validate)) {
                if (!empty($id)) {
                    $dataUserUpdate = array(
                        'us_username' => $dataUser['us_username'],
                        'us_name_display' => $dataUser['us_name_display'],
                        'us_fullname' => $dataUser['us_fullname'],
                        'us_email' => $dataUser['us_email'],
                        'us_balance' => $dataUser['us_balance'],
                    );
                    $dataUserUpdate['us_status'] = $dataUser['us_status'];
                    if (!empty($file)) {
                        $name = $this->auth['us_id'] . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataUserUpdate['us_avatar'] = $name;
                        }
                    }
                    if (!empty($dataUser['us_password'])) {
                        $dataUserUpdate['us_password'] = md5($dataUser['us_password']);
                    }
                    $this->data['type_page'] = 1;
                    $this->user->update($dataUserUpdate, $id);
                    $this->session->set_flashdata('success', 'Update user success');
                    redirect('admin/user/users');
                } else {
                    $dataUserInsert = array(
                        'us_username' => $dataUser['us_username'],
                        'us_name_display' => $dataUser['us_name_display'],
                        'us_fullname' => $dataUser['us_fullname'],
                        'us_email' => $dataUser['us_email'],
                        'us_balance' => $dataUser['us_balance'],
                        'us_status' => $dataUser['us_status'],
                        'us_password' => md5($dataUser['us_password']),
                    );
                    $dataUserInsert['us_status'] = $dataUser['us_status'];
                    if (!empty($file)) {
                        $name = $this->auth['us_id'] . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataUserInsert['us_avatar'] = $name;
                        }
                    }
                    $this->data['type_page'] = 2;
                    $this->user->insert($dataUserInsert);
                    $this->session->set_flashdata('success', 'Insert user success');
                    redirect('admin/user/users');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['user'] = $dataUser;
        $this->load('admin_layout', 'admin/user/update_user');
    }

    public function delete_user() {
        $this->load->model('user_model', 'user');
        $id = $this->input->post('us_id');
        if (!empty($id)) {
            $dataDelete = array(
                'us_id' => $id
            );
            $this->user->delete($dataDelete);
        }
    }

}

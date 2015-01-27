<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $controller = $this->router->fetch_class();
        $action = $this->router->fetch_method();
        $this->user_manager->retaurant_authenticate(mybase64_encode($controller . '/' . $action));
    }

    public function setting() {
        $this->user_manager->authenticate();
        $this->load->model('user_model', 'user');
        $this->data['userInfo'] = $this->user->getUserById($this->auth['us_id']);
        $this->load('front_layout', 'setting');
    }
    public function users() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('front_layout', 'manager/users');
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
                redirect('manager/update_user');
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
                    redirect('manager/users');
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
                    redirect('manager/users');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['user'] = $dataUser;
        $this->load('front_layout', 'manager/update_user');
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

   
    public function information() {

        $this->load->model('restaurant_model', 'restaurant');
        $this->load->library('setting_manager');
        $this->config->load('config', TRUE);
        $retaurant = $this->restaurant->getRetaurant(array('user_id' => $this->auth['id']));
        $this->load->model('user_model', 'user');
        $this->load->library('user_manager');

        $user = $this->user->getUserById($this->auth['id']);
        $state = $this->config->item('state_restaurant', 'config');
        $dataPost['firstname'] = $user['firstname'];
        $dataPost['lastname'] = $user['lastname'];
        $dataPost['email'] = $user['email'];
        $dataPost['phone'] = $user['phone'];
        $this->data['dataPost'] = $dataPost;
        if (empty($retaurant)) {
            $dataPost['address1'] = null;
            $dataPost['address2'] = null;
            $dataPost['suburb'] = null;
            $dataPost['state'] = null;
            $dataPost['name'] = null;
            $dataPost['postcode'] = null;
            $dataPost['res_phone'] = null;
        } else {
            $dataPost['address1'] = $retaurant['address1'];
            $dataPost['address2'] = $retaurant['address2'];
            $dataPost['suburb'] = $retaurant['suburb'];
            $dataPost['state'] = $retaurant['state'];
            $dataPost['name'] = $retaurant['name'];
            $dataPost['postcode'] = $retaurant['postcode'];
            $dataPost['res_phone'] = $retaurant['name'];
        }
        $posts = $this->input->post();
        if ($posts) {
            $dataPost = $posts;
            $validate = $this->setting_manager->validateRetaurant($dataPost);
            if (empty($validate)) {
                $dataUser['firstname'] = $dataPost['firstname'];
                $dataUser['lastname'] = $dataPost['lastname'];
                $dataUser['email'] = $dataPost['email'];
                $dataUser['phone'] = $dataPost['phone'];
                if (!empty($dataPost['password']))
                    $dataUser['password'] = md5($dataPost['password']);

                $dataRes['address1'] = $dataPost['address1'];
                $dataRes['address2'] = $dataPost['address2'];
                $dataRes['suburb'] = $dataPost['suburb'];
                $dataRes['state'] = $dataPost['state'];
                $dataRes['name'] = $dataPost['name'];
                $dataRes['postcode'] = $dataPost['postcode'];
                $this->user->update($dataUser, $this->auth['id']);
                $this->restaurant->update($dataRes, $retaurant['id']);
                $this->session->set_flashdata('success', 'Update information success');
                redirect(site_url('manager/information'));
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['state_restaurant'] = $state;
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['dataPost'] = $dataPost;
        $this->load('front_layout', 'manager/information');
    }

}

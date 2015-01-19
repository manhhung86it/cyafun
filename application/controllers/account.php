<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends MY_Controller {

    public function forgotPass() {
        $posts = $this->input->post();
        if ($posts) {
            $email = $posts['email'];
            $result = $this->user_manager->forgotPass($email);
            if ($result['success'] == 1)
                $this->data['success'] = 'please check email to change pass';
            else
                $this->data['error'] = $result['message'];
        }
        $this->data['title'] = 'fogot password';
        $this->load('front_layout', 'account/forgot-pass');
    }

    public function resetpass() {
        $email = $this->input->get('email');
        $key = $this->input->get('key');
        $error = false;
        if (empty($email) || empty($key)) {
            $error = TRUE;
        }
        $this->load->model('user_model', 'user');
        $dataWhere['us_email'] = $email;
        $dataWhere['us_key'] = $key;
        $user = $this->user->getUser($dataWhere);
        if (empty($user)) {
            $error = TRUE;
        }
        $posts = $this->input->post();
        if (!empty($posts) && $error == FALSE) {
            $password = $posts['password'];
            $rePassword = $posts['re_password'];
            $validate = $this->user_manager->validPassword($password, $rePassword);
            if (empty($validate)) {
                $dataUpdate['us_password'] = md5($password);
                $result = $this->user->update($dataUpdate, $user['us_id']);
                redirect(site_url('session/login'));
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['permission_error'] = $error;
        $this->load('front_layout', 'account/reset-pass');
    }

    public function index() {
        $this->load->model('user_model', 'user');
        $this->load->library('user_manager');

        $user = $this->user->getUserById($this->auth['us_id']);
        $dataPost['us_username'] = $user['us_username'];
        $dataPost['us_name_display'] = $user['us_name_display'];
        $dataPost['us_email'] = $user['us_email'];
        $dataPost['us_avatar'] = $user['us_avatar'];
        $posts = $this->input->post();
        $dir = PUBLICPATH . '/upload/';
        if ($posts) {
            $dataUserPost = $posts;
            $file = $_FILES['image'];
            if (!empty($file))
                $tmp_name = $file["tmp_name"];
            $validate = $this->user_manager->validUserAccount($dataUserPost, $file);
            if (empty($validate)) {
                $dataUser['us_name_display'] = $dataUserPost['nameDisplay'];
                $dataUser['us_email'] = $dataUserPost['email'];
                if (!empty($file)) {
                    $name = $this->auth['us_id'] . $file["name"];
                    if (move_uploaded_file($tmp_name, "$dir/$name")) {
                        $dataUser['us_avatar'] = $name;
                    }
                }
                $this->user->update($dataUser, $this->auth['us_id']);
                $this->session->set_flashdata('success', 'Update information success');
                redirect(site_url('account/account'));
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['dataPost'] = $dataPost;
        $this->load('front_layout', 'account/account');
    }

    public function changepass() {
        $this->load->library('user_manager');
        $this->load->model('user_model', 'user');

        $this->user_manager->authenticate();
        $posts = $this->input->post();
        if ($posts) {
            $dataPost = $posts;
            $validate = $this->user_manager->changepassValidate($dataPost, $this->auth['us_id']);
            if (empty($validate)) {
                $dataUser['us_password'] = md5($posts['newpass']);
                $this->user->update($dataUser, $this->auth['us_id']);
                $this->data['updatepass'] = 'change password success';
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['post'] = $posts;
        $this->load('front_layout', 'account/changepass');
    }

}

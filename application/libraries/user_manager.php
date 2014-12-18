<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_manager {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function authenticate($redirect = null) {
        $auth = $this->CI->session->userdata('auth');
        if (empty($auth))
            redirect(site_url('session/login?redirect=' . $redirect));
    }

    public function retaurant_authenticate($redirect = null) {
        $auth = $this->CI->session->userdata('auth');
        if (empty($auth))
            redirect(site_url('session/login?redirect=' . $redirect));
    }

    public function login_authenticate() {
        $auth = $this->CI->session->userdata('auth');
        if (!empty($auth))
            redirect(site_url('dashboard'));
    }

    public function admin_login_authenticate() {
        $admin = $this->CI->session->userdata('admin');
        if (!empty($admin))
            redirect(site_url('admin/dashboard'));
    }

    public function admin_authenticate() {
        $admin = $this->CI->session->userdata('admin');
        if (empty($admin))
            redirect(site_url('admin/authenticate/signin'));
    }

    public function adminLoginValidate($uname, $pass) {
        $dataResult = 1;
        if (empty($uname) || empty($pass)) {
            $dataResult = 0;
            return $dataResult;
        }
        $this->CI->load->model('administrator_model', 'administrator');

        $user = $this->CI->administrator->getUserLogin($uname, $pass);
        if (!empty($user)) {
            $this->updateAdminSession($user);
        } else {
            $dataResult = 0;
        }
        return $dataResult;
    }

    public function updateAdminSession($user) {
        unset($user['password']);
        $this->CI->session->set_userdata('admin', $user);
    }

    public function loginValidate($username, $pass) {
        $dataResult = 1;
        if (empty($username) || empty($pass)) {
            $dataResult = 0;
            return $dataResult;
        }
        $this->CI->load->model('user_model', 'user');

        $user = $this->CI->user->getUserLogin($username, $pass);
        if (!empty($user)) {
            $this->updateUserSession($user);
        } else {
            $dataResult = 0;
        }
        return $dataResult;
    }

    public function updateUserSession($user) {
        unset($user['password']);
        $this->CI->session->set_userdata('auth', $user);
    }

    public function forgotPass($email) {
        $dataResult['success'] = 1;
        if (empty($email) || !valid_email($email)) {
            $dataResult['success'] = 0;
            $dataResult['message'] = 'Invalid Email';
            return $dataResult;
        }
        $this->CI->load->model('user_model', 'user');
        $user = $this->CI->user->getUserByEmail($email);

        if (!empty($user)) {
            $dataResult['success'] = 1;
            $dataUpdate['us_key'] = $this->CI->tool->getGenerateKey();
            $this->CI->user->update($dataUpdate, $user['us_id']);
            $this->CI->load->library('mail');

            $mailTo['name'] = $user['us_username'];
            $mailTo['email'] = $email;

            $dataEmail['username'] = $user['us_username'];
            $dataEmail['forgot_link'] = site_url('account/resetpass?key=' . $dataUpdate['us_key'] . '&email=' . $email);

            sentMailTemp($mailTo, 'forgot_password', $dataEmail);
        } else {
            $dataResult['success'] = 0;
            $dataResult['message'] = 'Email does not exist';
        }
        return $dataResult;
    }

    public function validPassword($password, $rePassword) {
        $containsLetter = preg_match('/[a-zA-Z]/', $password);
        $containsDigit = preg_match('/\d/', $password);
        $containsSpecial = preg_match('/[^a-zA-Z\d]/', $password);
        $error = array();
        if (empty($password) || strlen($password) < 7) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        if (!$containsLetter || !$containsDigit) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }

        if ($password != $rePassword) {
            $error['re_password'] = 'Passwords do not match. Please re-enter your password';
        }

        return $error;
    }

    public function validEmail($email) {
        $mail = array();
        if (empty($email) || !valid_email($email)) {
            $mail['message_email'] = 'Please enter a valid email address.';
        }
        return $mail;
    }

    public function validPhone($phone) {
        $phone_return = array();
        $phone_validate = preg_match('/^0\d{10}$/', $phone);
        if (empty($phone) || !$phone_validate) {
            $phone_return['message_phone'] = 'Please enter numeric characers only';
        }
        return $phone_return;
    }

    public function registerUser($button_term, $username, $name, $email, $pass, $repass) {
        $error = array();
        if ($button_term == false) {
            $error['TermOfUse'] = 'Please read and accept the terms of use';
        }
        $select_user_by_name = $this->CI->My_model->select_where_c("users", array("us_username" => $username));
        if (!empty($select_user_by_name))
            $error['username'] = 'user name already exists';

        if (empty($username)) {
            $error['username'] = 'Please enter username';
        }

        if (empty($name)) {
            $error['displayname'] = 'Please enter display name';
        }
        if (empty($email) || !valid_email($email)) {
            $error['email'] = 'Email invalid';
        }
        $select_user = $this->CI->My_model->select_where_c("users", array("us_email" => $email));
        if (!empty($select_user))
            $error['email'] = 'Email already exists';
        if ($pass != $repass) {
            $error['repassword'] = 'Passwords do not match. Please re-enter your password';
        }
        $containsLetter = preg_match('/[a-zA-Z]/', $pass);
        $containsDigit = preg_match('/\d/', $pass);
        if (empty($pass) || strlen($pass) < 7) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        if (!$containsLetter || !$containsDigit) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        return $error;
    }

    public function validUserAccount($data, $file) {
        $error = array();
        if (!empty($file['tmp_name']))
            if (!getimagesize($file['tmp_name'])) {
                $error['image'] = 'Please upload image type';
            }
        if (empty($data['nameDisplay'])) {
            $error['nameDisplay'] = 'Please enter your name display';
        }
        if (empty($data['email']) || !valid_email($data['email'])) {
            $error['email'] = 'Email invalid';
        }
        $this->CI->load->model('user_model', 'user');
        $auth = $this->CI->session->userdata('auth');

        $emailExistsWhere['us_email'] = $data['email'];
        $emailExistsWhere['us_id !='] = $auth['us_id'];
        $checkEmailExists = $this->CI->user->getUser($emailExistsWhere);
        if (!empty($checkEmailExists))
            $error['email'] = 'Email already exists';
        return $error;
    }

    public function userCreateValidate($user, $id = null) {
        $this->CI->load->model('user_model', 'user');
        $error = array();
        if (empty($user['firstname'])) {
            $error['firstname'] = 'Please enter your first name';
        }
        if (empty($user['firstname'])) {
            $error['lastname'] = 'Please enter your first name';
        }

        if (empty($user['email']) || !valid_email($user['email'])) {
            $error['email'] = 'Email invalid';
        }

        $emailExistsWhere['email'] = $user['email'];
        if (!empty($id)) {
            $emailExistsWhere['id !='] = $id;
        }

        $checkEmailExists = $this->CI->user->getUser($emailExistsWhere);
        if (!empty($checkEmailExists))
            $error['email'] = 'Email already exists';

        if (!empty($user['phone']) && !is_numeric($user['phone'])) {
            $error['phone'] = 'Please enter valid phone number';
        }

        if ($user['password'] != $user['cf_password']) {
            $error['cf_password'] = 'Passwords do not match. Please re-enter your password';
        }
        $containsLetter = preg_match('/[a-zA-Z]/', $user['password']);
        $containsDigit = preg_match('/\d/', $user['password']);
        if (empty($id) || (!empty($id) && strlen($user['password']) > 0)) {
            if (empty($user['password']) || strlen($user['password']) < 7) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
            if (!$containsLetter || !$containsDigit) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
        }

        return $error;
    }

    public function changepassValidate($user, $id) {
        $this->CI->load->model('user_model', 'user');
        $error = array();

        $checkpass = $this->CI->user->getUserById($id);
        if (md5($user['oldpass']) != $checkpass['us_password']) {
            $error['oldpass'] = 'Old password incorrect';
        }

        if ($user['newpass'] != $user['cf_newpass']) {
            $error['cf_newpass'] = 'Passwords do not match. Please re-enter your password';
        }
        $containsLetter = preg_match('/[a-zA-Z]/', $user['newpass']);
        $containsDigit = preg_match('/\d/', $user['newpass']);
        if (strlen($user['newpass']) < 7) {
            $error['newpass'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        if (!$containsLetter || !$containsDigit) {
            $error['newpass'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }

        return $error;
    }

}

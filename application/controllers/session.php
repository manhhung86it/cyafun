<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session extends MY_Controller {

    function __construct() {
        parent::__construct();
        if ( !$this->input->post( 'remember' ) ){
        $this->session->sess_expire_on_close = TRUE;}
        $this->load->library('session');
    }

    public function login() {
        $redirect = $this->input->get('redirect');
        $this->user_manager->login_authenticate();
        $posts = $this->input->post();
        if ($posts) {
            $username = $posts['username'];
            $password = $posts['password'];
            $remember = isset($_POST['remember']);
            $result = $this->user_manager->loginValidate($username, $password);
            if ($result == 1) {
                if (empty($redirect))
                    redirect(site_url('dashboard'));
                else {
                    $redirect = mybase64_decode($redirect);
                    redirect(site_url($redirect));
                }
            } else
                $this->data['error'] = 'Wrong email/password';
        }
        $this->data['title'] = 'Cya fun';
        $this->load('front_layout', 'session/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
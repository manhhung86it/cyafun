<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authenticate extends CI_Controller {

    private $data;

    public function signin() {
        $this->user_manager->admin_login_authenticate();
        $posts = $this->input->post();
        if ($posts) {
            $username = $posts['username'];
            $password = $posts['password'];
            $result = $this->user_manager->adminLoginValidate($username, $password);
            if ($result == 1) {
                redirect(site_url('admin/dashboard'));
            }
            else
                $this->data['error'] = 'Wrong email/password';
        }
        $this->load->view('admin/authenticate/signin', $this->data);
    }

    public function signout() {
        $this->session->sess_destroy();
        redirect('authenticate/signin');
    }

    public function testCron() {

        $fp = fopen(PUBLICPATH . '/data.txt', 'a');
        fwrite($fp, time() . PHP_EOL);
        fclose($fp);

// the content of 'data.txt' is now 123 and not 23!
    }

}
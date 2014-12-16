<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->library('form_validation');
        $this->load->helper('date');
        $username = $this->input->post("InputUsername");
        $displayName = $this->input->post("InputDisplayName");
        $Password = $this->input->post("InputPassword");
        $RePassword = $this->input->post("InputRePassword");
        $Email = $this->input->post("InputEmail");
        $ownername = $this->input->post("Inputownername");
        $button_term = $this->input->post("TermOfUse");
        $redirect = $this->input->get('redirect');
        $this->user_manager->login_authenticate();
        if (isset($_POST["submit"])) {
            $validate = $this->user_manager->registerUser($button_term, $username, $displayName, $Email, $Password, $RePassword);
            if (empty($validate)) {
                $to_add = array(
                    "us_password" => md5($Password),
                    "us_username" => $username,
                    "us_name_display" => $displayName,
                    "us_email" => $Email,
                    "us_date_created" => date('Y-m-d H:i:s', now()),
                    "us_status" => 1,
                    "us_balance" => 0
                );
                $select_user_by_name = $this->My_model->select_where_c("users", array("us_username" => $username));
                $select_user = $this->My_model->select_where_c("users", array("us_email" => $Email));
                if ($select_user || $select_user_by_name) {
                    $this->data['info'] = 'this email address already exist';
                } else {
                    $insert = $this->My_model->inserting("users", $to_add);
                    if ($insert == TRUE) {
                        $result = $this->user_manager->loginValidate($username, $Password);
                        if ($result == 1) {
                            if (empty($redirect))
                                redirect(site_url('dashboard'));
                            else {
                                $redirect = mybase64_decode($redirect);
                                redirect(site_url($redirect));
                            }
                        }
                    } else
                        $this->data['error'] = 'Register failed';
                }
            }else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->load('front_layout', 'session/register');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
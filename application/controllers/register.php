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
        $firstname = $this->input->post("InputFirstname");
        $LastName = $this->input->post("InputLastName");
        $Password = $this->input->post("InputPassword");
        $RePassword = $this->input->post("InputRePassword");
        $Email = $this->input->post("InputEmail");
        $Phone = $this->input->post("InputPhone");

        $address1 = $this->input->post("Inputaddress1");
        $address2 = $this->input->post("Inputaddress2");
        $suburb = $this->input->post("Inputsuburb");
        $postcode = (int) $this->input->post("Inputpostcode");
        $state = $this->input->post("Inputstate");
        $ownername = $this->input->post("Inputownername");
        $button_term = $this->input->post("TermOfUse");
        $redirect = $this->input->get('redirect');
        $this->user_manager->login_authenticate();
        if (isset($_POST["submit"])) {
            $validate = $this->user_manager->registerUser($button_term, $firstname, $LastName, $Email, $Password, $RePassword, $Phone, $ownername, $suburb, $postcode);
            if (empty($validate)) {
                $to_add = array(
                    "password" => md5($Password),
                    "firstname" => $firstname,
                    "lastname" => $LastName,
                    "email" => $Email,
                    "date_added" => date('Y-m-d H:i:s', now()),
                    "phone" => $Phone
                );
                $select_user = $this->My_model->select_where_c("users", array("email" => $Email));
                if ($select_user) {
                    $this->data['info'] = 'this email address already exist';
                } else {
                    $insert = $this->My_model->inserting("users", $to_add);
                    $insert_id = $this->db->insert_id();
                    if ($insert == TRUE) {
                        $add_restaurant = array(
                            'user_id' => $insert_id,
                            'address1' => $address1,
                            'address2' => $address2,
                            'suburb' => $insert_id,
                            'postcode' => $address1,
                            'state' => $address2,
                            'name' => $ownername,
                            'phone' => $Phone
                        );
                        $insert2 = $this->My_model->inserting("restaurant", $add_restaurant);
                        $result = $this->user_manager->loginValidate($Email, $Password);
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
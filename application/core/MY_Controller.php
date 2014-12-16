<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * A base controller for all controllers. here we set various variables and tasks to avoid redundantly doing it throughout codebase
 *
 * @author 		Dean Gleeson <dean.gleeson@pragmaticsystems.com.au>
 * @date 		14/12/2012
 */
class MY_Controller extends CI_Controller {

    protected $auth;
    protected $admin;
    public $data;

    public function __construct() {
        parent::__construct();
        $this->data['controller'] = $this->router->fetch_class();
        $this->data['action'] = $this->router->fetch_method();
        $this->auth = $this->session->userdata('auth');
        $this->admin = $this->session->userdata('admin');
        $this->data['auth'] = $this->auth;
        $this->data['admin'] = $this->admin;
        $this->load->library('Mobiledetect');
    }

    function load($tpl_view, $body_view = null) {
        if (!is_null($body_view)) {
            if ($this->mobiledetect->isMobile() && file_exists(APPPATH . 'views/mobile/' . $body_view)) { // mobile
                $body_view_path = 'mobile/' . $body_view;
            } elseif ($this->mobiledetect->isMobile() && file_exists(APPPATH . 'views/mobile/' . $body_view . '.php')) { // mobile
                $body_view_path = 'mobile/' . $body_view . '.php';
            } elseif (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view . '.php')) {
                $body_view_path = $tpl_view . '/' . $body_view . '.php';
            } else if (file_exists(APPPATH . 'views/' . $body_view)) {
                $body_view_path = $body_view;
            } else if (file_exists(APPPATH . 'views/' . $body_view . '.php')) {
                $body_view_path = $body_view . '.php';
            } else {
                show_error('Unable to load the requested file: ' . $tpl_name . '/' . $view_name . '.php');
            }
            $data = $this->data;
            $body = $this->load->view($body_view_path, $data, TRUE);
            if (is_null($data)) {
                $data = array('body' => $body);
            } else if (is_array($data)) {
                $data['body'] = $body;
            } else if (is_object($data)) {
                $data->body = $body;
            }
        }
        $this->load->view('templates/' . $tpl_view, $data);
    }

}
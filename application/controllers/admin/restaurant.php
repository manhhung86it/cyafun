<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Restaurant extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }

    public function index() {

        $this->load->model('restaurant_model');

        $this->data['success'] = $this->session->flashdata('success');

        $this->data['breadcrumbs'][] = array('title' => 'restaurant');

        $this->data['restaurants'] = $this->restaurant_model->listRestaurant();

        $this->load('admin_layout', 'admin/restaurant/index');
    }

    public function update($id = 0) {

        $this->data['breadcrumbs'][] = array('link' => site_url('admin/restaurant'), 'title' => 'restaurant manager');

        $this->data['breadcrumbs'][] = array('title' => 'Edit');

        $this->load->model('restaurant_model');
        $this->config->load('config', TRUE);
        $this->load->library('setting_manager');

        $restaurant = $this->restaurant_model->getRetaurantById($id);
        $this->data['title'] = 'Add new restaurant';
        $state = $this->config->item('state_restaurant', 'config');
        $dataRestaurant = array();

        if ($restaurant) {
            $dataRestaurant['id'] = $restaurant['id'];
            $dataRestaurant['user_id'] = $restaurant['user_id'];
            $dataRestaurant['address1'] = $restaurant['address1'];
            $dataRestaurant['address2'] = $restaurant['address2'];
            $dataRestaurant['suburb'] = $restaurant['suburb'];
            $dataRestaurant['postcode'] = $restaurant['postcode'];
            $dataRestaurant['state'] = $restaurant['state'];
            $dataRestaurant['name'] = $restaurant['name'];
            $dataRestaurant['phone'] = $restaurant['phone'];
            $this->data['title'] = 'Update Restaurant';
            $availableUser = $this->restaurant_model->getAvailableUser($restaurant['user_id']);
        } else {
            $availableUser = $this->restaurant_model->getAvailableUser(0);
        }

        if ($this->input->post()) {

            $dataRestaurant = $this->input->post();
//            var_dump($dataRestaurant);die();
            $validate = $this->setting_manager->restaurantValidate($dataRestaurant, $id);

            if (empty($validate)) {

                if ($restaurant) {

                    $this->restaurant_model->update($dataRestaurant, $id);

                    $this->session->set_flashdata('success', 'Update Restaurant success');

                    redirect('admin/restaurant');
                } else {

                    $this->restaurant_model->insert($dataRestaurant);

                    $this->session->set_flashdata('success', 'Add new restaurant success');

                    redirect('admin/restaurant');
                }
            } else {

                $this->data['errors'] = $validate;
            }
        }
        $this->data['availableUser'] = $availableUser;
        $this->data['state_restaurant'] = $state;
        $this->data['restaurant'] = $dataRestaurant;

        $this->load('admin_layout', 'admin/restaurant/update');
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {
        $this->user_manager->authenticate();
        $this->load->library('order_manager');
        $this->load->model('order_model');

        if ($this->auth['parent_id']) {
            $dataWhere = '(user_id in (select id from users where parent_id=' . $this->auth['parent_id'] . ') or user_id = ' . $this->auth['parent_id'] . '  or user_id = ' . $this->auth['id'] . ')';
        } else {
            $dataWhere = '(user_id in (select id from users where parent_id=' . $this->auth['id'] . ') or user_id = ' . $this->auth['id'] . ')';
        }
        $dataWhere .= ' AND status != 4';
        $order = 'date_added';
        $fields = 'orders.*, users.firstname, users.lastname, users.email,';
        $orders = $this->order_model->listOrders($dataWhere, null, $fields, 5, 0, $order);
        $dataReturn = array();
        foreach ($orders as $order) {
            if ($order['user_id'] == $this->auth['parent_id'] || $order['user_id'] == $this->auth['id']) {
                $data = array(
                    'id' => $order['id'],
                    'user_id' => $order['user_id'],
                    'status' => $order['status'],
                    'date_added' => $order['date_added'],
                    'total' => $order['total'],
                    'date_modified' => $order['date_modified'],
                    'name' => $order['firstname']." ".$order['lastname'],
                    'email' => $order['email'],
                    'action' => 1,
                    'view' => 1);
            } else {
                $data = array(
                    'id' => $order['id'],
                    'user_id' => $order['user_id'],
                    'status' => $order['status'],
                    'date_added' => $order['date_added'],
                    'total' => $order['total'],
                    'date_modified' => $order['date_modified'],
                    'name' => $order['firstname']." ".$order['lastname'],
                    'email' => $order['email'],
                    'action' => 1,
                    'view' => 0);
            }
            $dataReturn[] = $data;
        }
        $this->data['orders'] = $dataReturn;
        $this->data['order_status'] = $this->order_manager->status;
        $this->load('front_layout', 'dashboard');
    }

}

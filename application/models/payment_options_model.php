<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Payment_options_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getPaymentOptions($data = array()) {
        $this->db->select('*');
        $this->db->from('payment_options');
        if (!empty($data))
            foreach ($data as $key => $val) {
                $this->db->where($key, $val);
            }
        $query = $this->db->get();
        return $query->result();
    }

    function getPaymentOptionsById($id) {
        $this->db->select('*');
        $this->db->from('payment_options');
        $this->db->where('payment_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('payment_options', $data);
    }

    function insert($data) {
        $this->db->insert('payment_options', $data);
        return $this->db->insert_id();
    }

    function delete($data) {
        $this->db->delete('payment_options', $data);
    }

    function deleteByPayment($id) {
        $this->db->where('payment_id', $id);
        $this->db->delete('payment_options');
    }

}

?>

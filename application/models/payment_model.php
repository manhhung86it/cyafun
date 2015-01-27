<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Payment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getPayment($data = array()) {
        $this->db->select('*');
        $this->db->from('payment');
        if (!empty($data))
            foreach ($data as $key => $val) {
                $this->db->where($key, $val);
            }
        $query = $this->db->get();
        return $query->result();
    }

    function getPaymentById($id) {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update($data, $id) {
//        $this->db->set('date_modified', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('payment', $data);
    }

    function insert($data) {
        $this->db->insert('payment', $data);
        return $this->db->insert_id();
    }

    function delete($data) {
        $this->db->delete('payment', $data);
    }

}

?>

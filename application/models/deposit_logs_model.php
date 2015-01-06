<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Deposit_logs_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getDeposit_logs($data) {
        $this->db->select('*');
        $this->db->from('deposit_logs');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function update($data, $id) {
//        $this->db->set('date_modified', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('deposit_logs', $data);
    }

    function insert($data) {
        $this->db->set('date_payment', 'NOW()', FALSE);
        $this->db->insert('deposit_logs', $data);
        return $this->db->insert_id();
    }

    function delete($data) {
        $this->db->delete('deposit_logs', $data);
    }

}

?>

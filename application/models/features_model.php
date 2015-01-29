<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Features_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getFeatures($data) {
        $this->db->select('*');
        $this->db->from('frontend');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function getFrontEnd($page, $limit) {
        $this->db->select('*');
        $this->db->from('frontend');
        $this->db->where('page', $page);
        if ($limit != 'all') {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        $lists = $query->result_array();
        return $lists;
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('frontend', $data);
    }

    function insert($data) {
        $this->db->insert('frontend', $data);
        return $this->db->insert_id();
    }

    public function getFeaturesById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('frontend');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $product = $query->row_array();
        return $product;
    }

    function delete($data) {
        return $this->db->delete('frontend', $data);
    }

    function listFeatures($data = array(), $dataIn = array(), $fields = '*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $this->db->select($fields);
        $this->db->from('frontend');
        if (!empty($data)) {
            if (is_array($data)) {
                foreach ($data as $key => $val) {
                    $this->db->where($key, $val);
                }
            } else {
                $this->db->where($data);
            }
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }
        if ($limit && $offset)
            $this->db->limit($limit, $offset);
        elseif ($limit)
            $this->db->limit($limit);
        if (!empty($order))
            $this->db->order_by($order, $sort);
        $query = $this->db->get();
        $lists = $query->result_array();
        return $lists;
    }

    function totalFeatures($data = array(), $dataIn = array()) {
        $this->db->select('count(id) as total');
        $this->db->from('frontend');
        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $list) {
                $this->db->where_in($list);
            }
        }
        $query = $this->db->get();
        $lists = $query->row_array();
        return $lists['total'];
    }

}

?>

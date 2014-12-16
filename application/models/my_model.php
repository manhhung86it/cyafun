<?php

class My_model extends CI_Model {
    /*     * ************* Select data *************************** */

    function select_where_c_o($table, $where, $order) {
        return $this->db
                        ->order_by($order, 'desc')
                        ->where($where)
                        ->get($table)
                        ->result();
    }

    function selectall_recent($table) { //Select all recent added content with limit 5 
        return $this->db
                        ->order_by("date_record", "desc")
                        ->get($table, 10)
                        ->result();
    }

    function selectall_recent_post($table) { //Select all recent added content with limit 5 
        return $this->db
                        ->order_by("post_date", "desc")
                        ->get($table, 4)
                        ->result();
    }

    function select_recent_limit($table, $column, $limit) { //Select all recent added content with limit 5 
        return $this->db
                        ->order_by($column, "desc")
                        ->get($table, $limit)
                        ->result();
    }

    function select_byname($table, $column, $order) { //Select all recent added content with limit 5 
        return $this->db
                        ->order_by($column, $order)
                        ->get($table)
                        ->result();
    }

    function select_only($table) { //Select table
        return $this->db
                        ->get($table)
                        ->result();
    }

    function selectall_srecent($table, $where) { //Select all recent added data with where condition, limit 5  
        return $this->db
                        ->order_by("date", "desc")
                        ->where($where)
                        ->get($table, 5)
                        ->result();
    }

    function select_where($table, $where) { // select wher return  2 dimensional array
        return $this->db
                        ->where($where)
                        ->get($table)
                        ->row();
    }

    function select_where_c($table, $where) { //Select all with where condition return array
        return $this->db
                        ->where($where)
                        ->get($table)
                        ->result();
    }

    function select_where_c_order($table, $where, $order) { //Select all with where condition return array
        return $this->db
                        ->order_by($order, 'asc')
                        ->where($where)
                        ->get($table)
                        ->result();
    }

    function select_where_c_d_order($table, $where, $order) { //Select all with where condition return array		
        return $this->db
                        ->order_by($order, 'desc')
                        ->where($where)
                        ->get($table)
                        ->result();
    }

    function select_orderby($table, $order) { //Select all with where condition return array
        return $this->db
                        ->order_by($order, 'desc')
                        ->get($table)
                        ->result();
    }

    /*     * ************************************ */

    /*     * ************Count********************* */

    function count_where($table, $where) {
        return $this->db
                        ->where($where)
                        ->get($table)
                        ->num_rows();
    }

    function count_alls($table) {
        return $this->db
                        ->get($table)
                        ->num_rows();
    }

    /*     * **************sums************* */

    function sum($table, $where, $column) {
        return $this->db
                        ->select_sum($column)
                        ->where($where)
                        ->get($table)
                        ->num_rows();
    }

    function sums($column, $where, $table) {
        $query = $this->db->select_sum($column);
        $query = $this->db->where($where);
        $query = $this->db->get($table);
        $result = $query->result();
        return $result[0]->rating_value;
    }

    /*     * ******For Pagination******** */

    function record_count($table) {
        return $this->db->count_all($table);
    }

    function fetch_post($limit, $start, $table) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by("prod_release", "desc")->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function fetch_post1($limit, $start, $table) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by("prod_release", "asc")->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function fetch_post2($limit, $start, $table, $column) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by($column, "desc")->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function fetch_postm($limit, $start, $table, $column) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by($column, "asc")->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function fetch_where($limit, $start, $table, $column, $where) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by($column, "asc")->where($where)->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function fetch_like($limit, $start, $table, $column, $like) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by($column, "asc")->like($like)->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    /*     * function select_join($table)

      {
      return $this->db
      ->join( 'product_category', 'assign_product_category.prod_cat_id = product_category.prod_cat_id')
      ->order_by( 'product_category.prod_cat_name' ,"desc")
      ->get($table)
      ->result();
      }* */

    function fetch_postd($limit, $start, $table, $column) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by($column, "desc")->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    /*     * ***************************** */

    /*     * **********Insert********************* */

    function inserting($table, $to_insert) {
        return $this->db
                        ->insert($table, $to_insert);
    }

    /*     * ********************************* */

    /*     * ***********Delete******************** */

    function delete_where($table, $where) {
        return $this->db
                        ->where($where)
                        ->delete($table);
    }

    /*     * ****************************** */




    /*     * ******************Update*************************** */

    function update($table, $to_update) {// update single
        return $this->db
                        ->update($table, $to_update);
    }

    function update_all_c($table, $to_update, $where) { // update where
        return $this->db
                        ->where($where)
                        ->update($table, $to_update);
    }

    /*     * ************************************* */

    /*     * *********Like************* */

    function select_all($table, $like, $value) {
        return $this->db
                        ->like($like, $value)
                        //->order_by($order, $asc)
                        ->get($table)
                        ->result();
    }

    /*     * ************************* */

    function autocomplete($table, $field) {
        $this->db->select($field);
        $this->db->where($field, 1);
        $this->db->like($field, 'hello');
        return $this->db->get($table, 10);
    }

    /*     * **********Just for Blog**************** */

    function blog_archive() {
        $query = $this->db->select(array('MONTH(post_date) as months', 'YEAR(post_date) as yeahboy'))->distinct()->from('post');
        $query = $this->db->get();
        return $query->result();
    }

    function select_where_c_o_limit($table, $where, $order) {
        return $this->db
                        ->order_by($order, 'desc')
                        ->limit(1)
                        ->where($where)
                        ->get($table)
                        ->result();
    }
}

?>
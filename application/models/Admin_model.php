<?php

Class Admin_model extends CI_Model {

// Read data using username and password
    public function login($username, $password) {

        $condition = "username =" . "'" . $username . "' AND " . "password =" . "'" . md5($password) . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function product_list_active() {
        $this->db->where(array('delete_status' => 0, 'active' => 1));
        $this->db->order_by('rank','asc');
        $this->db->order_by("last_edit_date", "desc");
        return $this->db->get('products')->result_array();
    }

    function product_list_inactive() {
        $this->db->where(array('delete_status' => 0, 'active' => 0));
        $this->db->order_by('rank','asc');
        $this->db->order_by("last_edit_date", "desc");
        return $this->db->get('products')->result_array();
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function add_product($name, $desc, $stock, $image=NULL) {
        $this->db->where('delete_status',0);
        $this->db->order_by('rank','asc');
        $res = $this->db->get('products') ->result_array();
        $last_rank = end($res)['rank'];
        
        $data = array('name' => $name,
            'description' => $desc,
            'stock' => $stock,
            'image' => $image,
            'added_by' => $this->session->userdata['user_id'],
            'rank' => $last_rank+1);
        $this->db->insert('products', $data);
    }

    function edit_product($name, $desc, $stock, $image, $id,$rank) {
        if ($image != NULL) {
            $data = array('name' => $name,
                'description' => $desc,
                'stock' => $stock,
                'image' => $image,
                'last_edited_by' => $this->session->userdata['user_id'],
                'rank' => $rank,
                'last_edit_date' => date("Y-m-d H:i:s"));
        } else {
            $data = array('name' => $name,
                'description' => $desc,
                'stock' => $stock,
                'last_edited_by' => $this->session->userdata['user_id'],
                'last_edit_date' => date("Y-m-d H:i:s"),
                'rank' => $rank);
        }
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function status_change($id, $status) {
        $data = array('active' => $status,
            'last_edited_by' => $this->session->userdata['user_id'],
            'last_edit_date' => date("Y-m-d H:i:s"));
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    function delete_product($id) {
        $data = array('delete_status' => 1,
            'last_edited_by' => $this->session->userdata['user_id'],
            'last_edit_date' => date("Y-m-d H:i:s"));
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    function product_details($id) {
        $this->db->where(array('id' => $id));

        return $this->db->get('products')->result_array()[0];
    }

    function all_active_products() {
        $this->db->where(array('active' => 1, 'delete_status' => 0));
        $this->db->order_by('rank','asc');
        $this->db->order_by("last_edit_date", "desc");
        return $this->db->get('products')->result_array();
    }
    
    function all_active_products_html($limit , $start) {
        $this->db->where(array('active' => 1, 'delete_status' => 0));
        $this->db->order_by('rank','asc');
        $this->db->order_by("last_edit_date", "desc");
        $this->db->limit($limit, $start);
        return $this->db->get('products')->result_array();
    }

    function check_old_pass($pass) {
        $md = md5($pass);
        $username = $this->session->userdata['user_id'];
        $this->db->where(array('password' => $md, 'username' => $username));
        $this->db->limit(1);
        $res = $this->db->get('users');
        if ($res->num_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_pass($pass) {
        $md = md5($pass);
        $username = $this->session->userdata['user_id'];
        $data = array('password' => $md);
        $this->db->where(array('username' => $username));
        $this->db->update('users', $data);
    }

    function images_list() {
        $this->db->select('id,name');
        $this->db->where(array('delete_status' => 0));
        $this->db->order_by("id", "desc");
        return $this->db->get('gallery')->result_array();
    }

    function add_gallery_image($file_name) {
        $data = array('name' => $file_name);
        $this->db->insert('gallery', $data);
    }
    
    function remove_image($id){
        $data = array('delete_status' => 1);
        $this->db->where('id',$id);
        return $this->db->update('gallery', $data);
    }

}

?>
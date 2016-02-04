<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($table, $data){
        if($this->db->insert($table, $data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    public function update($table, $data, $where){
        $this->db->trans_start();
        $this->db->update($table, $data, $where);
        $this->db->trans_complete();
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }else{
            if($this->db->trans_status() === FALSE) {
                return FALSE;
            }
            return TRUE;
        }
    }
    
    public function delete($table, $where){
        if($this->db->delete($table, $where)){
            return TRUE;
        }
        return FALSE;
    }
    
    public function get_all($table, $where = FALSE){
        $query = ($where) ? $this->db->get_where($table, $where) : $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_row($table, $where){
        $query = $this->db->get_where($table, $where);
        if($query->num_rows() > 0){
            return $query->row();
        }
        return FALSE;
    }
    
    public function authenticate($username, $pass){
        $sessionvar = $this->session->userdata;
        $chk_user_status = "SELECT * FROM tbl_users WHERE user_name = '".$username."' AND user_pass = '".md5($pass)."'";
        $q = $this->db->query($chk_user_status);
        if($q->num_rows() == 1){
            $row = $q->row();
            if($row->user_status <> 1){
                return 'inactive';
            }
        }
        $query = $this->db->get_where('tbl_users', array('user_name' => $username, 'user_pass' => md5($pass), 'user_status' => 1));
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
}
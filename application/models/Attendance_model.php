<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->model('attendance_model');
    }
    
    public function get_attendance_status($user_id, $status){
        $q = "SELECT * FROM `tbl_attendance` WHERE `attend_at` >  CURDATE() AND attend_at < subdate(CURDATE(), -1) AND `status` = '$status'";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    
    public function check_break_status($user_id){
        $q = "SELECT * FROM `tbl_emp_break` where id_user = $user_id and `taken_at` >  CURDATE() AND taken_at < subdate(CURDATE(), -1)";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            $count = $query->num_rows();
            if($count % 2 == 0){
                return TRUE;
            }else {
                return FALSE;
            }
        }else{
            return TRUE;
        }
    }
    
    public function get_break_status($user_id, $break_type, $break_status){
        $q = "SELECT * FROM `tbl_emp_break` WHERE `taken_at` >  CURDATE() AND taken_at < subdate(CURDATE(), -1) AND `status` = '$break_status' AND `id_user` = $user_id AND `break_type` = $break_type";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    
    public function break_status_for_employees($break_type){
        $q = "SELECT u.user_name, b.* FROM `tbl_emp_break` AS b INNER JOIN `tbl_users` AS u ON b.id_user = u.id_user WHERE b.`taken_at` >  CURDATE() AND b.taken_at < subdate(CURDATE(), -1) AND b.`break_type` = $break_type AND b.`status` = '0'";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }
    
    public function break_end_status_for_employee($break_type, $user_id){
        $q = "SELECT * FROM `tbl_emp_break` WHERE `taken_at` >  CURDATE() AND taken_at < subdate(CURDATE(), -1) AND `break_type` = $break_type AND `status` = '1'";
        $query = $this->db->query($q);
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
}
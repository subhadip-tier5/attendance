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
    
    public function get_break_status($user_id, $break_type, $break_status){
        $q = "SELECT * FROM `tbl_emp_break` WHERE `taken_at` >  CURDATE() AND taken_at < subdate(CURDATE(), -1) AND `status` = '$break_status' AND `id_user` = $user_id AND `break_type` = $break_type";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }
}
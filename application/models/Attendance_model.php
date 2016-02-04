<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->model('attendance_model');
    }
    
    function get_attendance_status($user_id, $status){
        $q = "SELECT * FROM `tbl_attendance` WHERE `attend_at` >  subdate(CURDATE(), 1) AND attend_at < subdate(CURDATE(), -1) AND `status` = '$status'";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    
}
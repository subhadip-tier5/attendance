<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('attendance_model');
    }
    
    public function index(){
        $userType = $this->session->userdata('user_type');
        switch ($userType){
            case 1:
                $header['title'] = 'Admin Dashboard';
                $header['display_name'] = get_userdata_by_id($this->session->userdata('id_user'), 'user_name');
                $data['header'] = $header;
                $data['template'] = 'home_admin';
                $this->load->view('master', $data);
                break;
            case 2: 
                if($clockin = $this->attendance_model->get_attendance_status($this->session->userdata('id_user'), '0')){
                    $data['clockin'] = $clockin;
                }else{
                    $data['clockin'] = FALSE;
                }
                if($clockout = $this->attendance_model->get_attendance_status($this->session->userdata('id_user'), '1')){
                    $data['clockout'] = $clockout;
                }else{
                    $data['clockout'] = FALSE;
                }
                $header['title'] = 'Employee Dashboard';
                $header['display_name'] = get_userdata_by_id($this->session->userdata('id_user'), 'user_name');
                $data['header'] = $header;
                $data['template'] = 'home_employee';
                $this->load->view('master', $data);
                break;
            default :
                break;
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect();
        exit();
    }
}
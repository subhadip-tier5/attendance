<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('site_model');
        $this->load->model('attendance_model');
    }
    
    public function clockin(){
        $data = array(
            'id_user' => $this->input->post_get('user_id'),
            'attend_at' => date(DATETIME_DATABASE_FORMAT),
            'status' => '0'
        );
        if($insert_id = $this->site_model->insert('tbl_attendance', $data)){
            if($data = $this->site_model->get_row('tbl_attendance', array('id_attendance' => $insert_id))){
                $response = array(
                    'clockin_time' => date(TIME_DISPLAY_FORMAT, strtotime($data->attend_at)),
                    'clockin_date' => date(DATE_DISPLAY_FORMAT_LONG, strtotime($data->attend_at)),
                    'status' => 'success'
                );
                echo json_encode($response);
            }
        }else{
            $response = array(
                'status' => 'error'
            );
            echo json_encode($response);
        }
    }
    
    public function clockout(){
        if(!$this->attendance_model->get_attendance_status($this->input->post_get('user_id'), '0')){
            $response = array(
                'status' => 'error',
                'message' => 'Ohh !! Please make clock in first!'
            );
            echo json_encode($response);
            die();
        }
        $data = array(
            'id_user' => $this->input->post_get('user_id'),
            'attend_at' => date(DATETIME_DATABASE_FORMAT),
            'status' => '1'
        );
        if($insert_id = $this->site_model->insert('tbl_attendance', $data)){
            if($data = $this->site_model->get_row('tbl_attendance', array('id_attendance' => $insert_id))){
                $response = array(
                    'clockout_time' => date(TIME_DISPLAY_FORMAT, strtotime($data->attend_at)),
                    'clockout_date' => date(DATE_DISPLAY_FORMAT_LONG, strtotime($data->attend_at)),
                    'status' => 'success'
                );
                echo json_encode($response);
            }
        }else{
            $response = array(
                'status' => 'error'
            );
            echo json_encode($response);
        }
    }
    
    public function storeAbreak(){
        $data = array(
            'id_user' => $this->input->post('user_id'),
            'break_type' => $this->input->post('break_type'),
            'taken_at' => date(DATETIME_DATABASE_FORMAT),
            'status' => $this->input->post('break_status')
        );
        
        if($insert_id = $this->site_model->insert('tbl_emp_break', $data)){
            if($data = $this->site_model->get_row('tbl_emp_break', array('id_emp_break' => $insert_id))){
                $response = array(
                    'break_start_time' => date(TIME_DISPLAY_FORMAT, strtotime($data->taken_at)),
                    'break_end_time' => date(DATE_DISPLAY_FORMAT_LONG, strtotime($data->taken_at)),
                    'status' => 'success'
                );
                echo json_encode($response);
            }
        }
    }
}
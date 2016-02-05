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
        if($res = $this->site_model->get_row('tbl_break', array('break_type' => $this->input->post('break_type')))){
            $interval = $res->break_time;
        }
        if($this->input->post('break_status') == 0){
            if(!$this->attendance_model->check_break_status($this->input->post('user_id'))){
                $response = array(
                   'status' => 'error',
                   'message' => 'You are already into a break. You can not take a break within an another break!!'
               );
               echo json_encode($response);
               die();
           }
        }
        
        if($insert_id = $this->site_model->insert('tbl_emp_break', $data)){
            if($data = $this->site_model->get_row('tbl_emp_break', array('id_emp_break' => $insert_id))){
                $response = array(
                    'break_start_time' => date(TIME_DISPLAY_FORMAT, strtotime($data->taken_at)),
                    'break_end_time' => date(TIME_DISPLAY_FORMAT, strtotime(date(DATETIME_DATABASE_FORMAT, strtotime($data->taken_at)).'+20 minutes')),
                    'countdown_endtime' => date(COUNTDOWN_DATETIME_FORMAT, strtotime(date(DATETIME_DATABASE_FORMAT, strtotime($data->taken_at)).'+'.$interval.' minutes')),
                    'status' => 'success'
                );
                echo json_encode($response);
            }
        }
    }
    
    public function break_status_for_employees(){
        $table = '';
        if($results = $this->attendance_model->break_status_for_employees($this->input->post('break_type'))){
            foreach ($results as $result) {
                if($res = $this->site_model->get_row('tbl_break', array('break_type' => $this->input->post('break_type')))){
                    $interval = $res->break_time;
                }
                $table_insert = '';
                $start_break = $result->taken_at; // break taken by employee    
                if($br_stat = $this->attendance_model->break_end_status_for_employee($this->input->post('break_type'), $result->id_user)){
                    $end_time = $br_stat->taken_at; // break ended by employee
                    $actual_break_end_time = date(DATETIME_DATABASE_FORMAT, strtotime(date(DATETIME_DATABASE_FORMAT, strtotime($start_break)).'+'.$interval.' minutes')); // actual end break time
                    $date_start = new DateTime($actual_break_end_time);
                    $date_end = new DateTime($end_time);
                    $interval = date_diff($date_start,$date_end);
                    
                    $break_status_emp = (strtotime($end_time) > strtotime($actual_break_end_time)) ? 'Late' : 'Left';
                    $tr_class = (strtotime($end_time) > strtotime($actual_break_end_time)) ? 'danger' : 'success';
                    $table_insert .= '<td>'.date(TIME_DISPLAY_FORMAT, strtotime($end_time)).'</td>';
                    $table_insert .= '<td>'.$interval->format('%h:%i:%s').' '.$break_status_emp.'</td>';
                    $table_insert_sript = '';
                }else{
                    $tr_class = 'warning';
                    $table_insert .= '<td>On break</td>';
                    $countdown_date = date(COUNTDOWN_DATETIME_FORMAT, strtotime(date(DATETIME_DATABASE_FORMAT, strtotime($result->taken_at)).'+'.$interval.' minutes'));
                    $table_insert .= '<td id="clock_'.$result->id_emp_break.'">no</td>';
                    $table_insert_sript = "<script type='text/javascript'>"
                        . "$(document).ready(function(){"
                        . "$('#clock_".$result->id_emp_break."').countdown('".$countdown_date."', {elapse: true})
                        .on('update.countdown', function(event) {
                            if(event.elapsed) {
                                $(this).parent().removeClass().addClass('danger');
                                $(this).html(event.strftime('%H:%M:%S late'));
                            }else{
                                $(this).parent().removeClass().addClass('warning');
                                $(this).html(event.strftime('%H:%M:%S left'));
                            }
                        });
                        });
                        </script>";
                }
                $table .= '<tr class="warning">';
                $table .= '<td>'.$result->user_name.'</td>';
                $table .= '<td style="width: 25% !important;">'.date(TIME_DISPLAY_FORMAT, strtotime($start_break)).'</td>';
                $table .= $table_insert;
                $table .= '</tr>';
                $table .= $table_insert_sript;
                
            }
            echo $table;
        }else{
            echo $table .= '<tr class="active"><td colspan="4">Currently none has taken this break</td></tr>';
        }
    }
}
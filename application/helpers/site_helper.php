<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function message_alert($msg, $msg_code, $show_close = TRUE){
    $message = '';
    switch($msg_code):
        case 1: // info
            $message .= '<div role="alert" class="alert alert-info alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
        case 2: // success
            $message .= '<div role="alert" class="alert alert-success alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
        case 3: // warning
            $message .= '<div role="alert" class="alert alert-warning alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
        case 4: // error
            $message .= '<div role="alert" class="alert alert-danger alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
    endswitch;
    return $message;
}

function DBUG($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    die();
}

function keygen($length = 10){
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function paginav($base_url, $total_rows, $per_page, $uri_segment, $first_url){
    $CI = &get_instance();
    $config = array();
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['uri_segment'] = $uri_segment;
    $config['use_page_numbers']  = TRUE;
    $config['first_url'] = $first_url;
    $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
    $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='active'><a href='javascript:void(0);'>";
    $config['cur_tag_close'] = "</a></li>";
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $CI->pagination->initialize($config);
    return $config;
}

function get_userdata_by_id($user_id, $attribute = FALSE){
    $CI = &get_instance();
    $CI->load->model('site_model');
    if($row = $CI->site_model->get_row('tbl_users', array('id_user' => $user_id))){
        if($attribute){
            return $row->$attribute;
        }
        return $row;
    }else{
        return FALSE;
    }
}

function get_admin_permalink(){
    if(get_instance()->uri->segment(1, 0) === FALSE){
        return FALSE;
    }
    return get_instance()->uri->segment(1, 0);
}
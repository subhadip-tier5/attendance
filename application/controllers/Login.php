<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('is_logged_in')){
            redirect('dashboard');
            exit();
        }
    }
    
    public function index(){
        $this->load->library('form_validation');
        if($this->input->post('login') <> NULL){
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
            $this->form_validation->set_rules('user_pass', 'Password', 'trim|required');
            if($this->form_validation->run() == FALSE){            
                $header['title'] = 'Login';
                $data['header'] = $header;
                $data['template'] = 'login';
                $this->load->view('master', $data);
            }else{
                $this->load->model('site_model');
                if($auth = $this->site_model->authenticate($this->input->post('user_name'), $this->input->post('user_pass'))){
                    if($auth === 'inactive'){
                        $this->session->set_userdata('err_msg','Your account has been inactive. Please contact to administrator');
                        redirect();
                        exit();
                    }
                    $userInfo = array(
                        'id_user' => $auth->id_user,
                        'user_type' => $auth->user_type,
                        'is_logged_in' => TRUE
                    );
                    $this->session->set_userdata($userInfo);
                    redirect('home');
                    exit();
                }else{
                    $msg['authentication_failed'] = 'Email address or password does not match!';
                    $header['title'] = 'Login';
                    $data['header'] = $header;
                    $data['template'] = 'login';
                    $this->load->view('master', $data);
                }
            }
        }else{
            $header['title'] = 'Login';
            $data['header'] = $header;
            $data['template'] = 'login';
            $this->load->view('master', $data);
        }
        
        
    }
}
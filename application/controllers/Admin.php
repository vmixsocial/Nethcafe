<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
	  parent::__construct();
	  	  
	 } 

 function index(){
 	$this->load->view('internal/login_viw');
 }

 function check_login(){
 	$type = 1;
 	$username = $this->input->post('username');
 	$password = $this->input->post('password');
 	$authcheck = $this->common_model->auth_check_admin($username,$password,$type);

 	if(sizeof($authcheck)>0){
 		$this->set_session($authcheck);
        redirect('dashboard','refresh');
 	}else{
 		$this->session->set_flashdata('errormsg', 'Invalid Login. Please Try Again !!!');	
        redirect('admin','refresh');
 	}
 }

 function set_session($authcheck){
 	$newdata = array(
        'emp_id' => $authcheck->emp_id,
        'user_level'    => $authcheck->emp_type,
        'emp_name' => $authcheck->emp_name,
        'user_id' => $authcheck->user_id
    );

    $this->session->set_userdata($newdata);
 }

 function logout(){
		session_destroy();
		redirect('admin','refresh');
	}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__.'/../../vendor/autoload.php';
use Kreait\Firebase\Factory;

class Login extends CI_Controller {

	public function __construct(){
		Parent::__construct();
			$this->load->library('database_library');
			$this->load->model('Main_Model');

			$factory = (new Factory)->withServiceAccount(__DIR__.'/../../uploads/cellva-logistics-5b844-firebase-adminsdk-xaas4-3c5cc97033.json')
			->withDatabaseUri('https://cellva-logistics-5b844-default-rtdb.firebaseio.com/');
			$this->database = $factory->createDatabase();
	}
	
	public function index(){
		$this->load->view('admin/login/index');
	}
	
	public function submitLogin(){
		//echo "<pre>"; print_r($this->input->post('password')); exit;
		if($this->input->post('email') == "Admin"){
			if($this->Main_Model->postAdminLogin($this->input->post('email'),$this->input->post('password'))){
				redirect(base_url().'Admin/dashboard');
			}else{
				$this->session->set_flashdata('suc_msg', "<span style='color:red' >Please check your User Name and Password.</span>");
				redirect(base_url().'admin');
			}
		}else{			
			$this->session->set_flashdata('suc_msg', "<span style='color:red' >Please check your User Name and Password.</span>");
			redirect(base_url().'admin');
		}
			

			
	}


	
	
	
}


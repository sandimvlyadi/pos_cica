<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('username');
		if(($isLogin!="")):
		redirect('dashboard');		
		endif;
	    $this->load->model('model_login','model');       
    }

    public function logout() {
    	$session = array(
	        'username',
	        'name' ,
	        'role',
	        'isLogin',
		);
		$this->session->unset_userdata($session);
		redirect('login');
	}

	public function index()
	{
		$this->load->library('encryption');
		$this->load->view('login');
	}

	public function exeAuth()
	{
		$login = $this->model->getData();
		if($login['proses'] == "success"){
			echo "<script>alert('Berhasil login');</script>";
			if($login['role']=="admin"){
				echo "<script>document.location.href = '".base_url()."dashboard/admin';</script>";
			}elseif($login['role']=="kasir"){
				echo "<script>document.location.href = '".base_url()."order/add';</script>";
			}elseif($login['role']=="dapur"){
				echo "<script>document.location.href = '".base_url()."dashboard/dapur';</script>";
			}elseif($login['role']=="owner"){
				echo "<script>document.location.href = '".base_url()."dashboard/owner';</script>";
			}
			
		}elseif($login['proses'] == "danger"){
			echo "<script>alert('Username Dan Password salah');</script>";
			echo "<script>document.location.href = '".base_url()."login';</script>";
		}
	}

}

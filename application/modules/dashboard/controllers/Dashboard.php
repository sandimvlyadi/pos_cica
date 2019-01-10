<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('username');
		if(($isLogin=="")):
		redirect('login');		
		endif;  
    }

    public function index(){
    	$isLogin = $this->session->userdata('username');
		if(($isLogin=="")):
		redirect('login');		
		endif;  
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
	
	public function admin()
	{
		$role = $this->session->userdata('role');
		if($role!="admin"){
			redirect('dashboard/logout');		
		};  

		$data['content'] = "<h1>Hello World!!!</h1>";
		$this->load->view('theme_admin', $data);
	}


	public function dapur()
	{
		$role = $this->session->userdata('role');
		if($role!="dapur"){
			redirect('dashboard/logout');		
		};  

		// $data['content'] = "<h1>Hello World!!!</h1>";
		// $this->load->view('theme_dapur', $data);
		redirect('order_dapur/index');
	}

	public function kasir()
	{
		$role = $this->session->userdata('role');
		if($role!="kasir"){
			redirect('dashboard/logout');		
		};  

		$data['content'] = "<h1>Hello World!!!</h1>";
		$this->load->view('theme_kasir', $data);
	}

	public function owner()
	{
		$role = $this->session->userdata('role');
		if($role!="owner"){
			redirect('dashboard/logout');		
		};  

		$data['content'] = "<h1>Hello World!!!</h1>";
		$this->load->view('theme_owner', $data);
	}
}

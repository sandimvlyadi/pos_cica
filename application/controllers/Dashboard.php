<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('username');
        if(($isLogin=="")):
        redirect('admin');      
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
		redirect('admin');
	}
}
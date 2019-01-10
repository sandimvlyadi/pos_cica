<?php
Class Model_login extends CI_Model {

	function getData(){
		$this->load->library('encryption');
		$username = $this->input->post('txtUsername');
		$password = $this->input->post('txtPassword');
		$proses = "";
		$role = "";

		$query = $this->db->query("SELECT * FROM account WHERE username='$username'");
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$passdecrypt = $this->encryption->decrypt($row['password']);
			if($passdecrypt == $password){
				$newdata = array(
			        'username'  => $row['username'],
			        'name'  => $row['name'],
			        'role' => $row['role'],
			        'isLogin' => TRUE,
				);
				$this->session->set_userdata($newdata);
				
				$proses = "success";
				$role = $row['role'];
			}else{
				$proses = "danger";
			}
		}else{
			$proses = "danger";
		}

		return array('proses'=>$proses, 'role'=>$role);
	}
}
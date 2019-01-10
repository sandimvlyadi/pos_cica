<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Model_kategori extends CI_Model {

	function getData(){
		$this->db->select("*");
		$this->db->from('kategori');
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function insertData(){
		$alert = "";
		$result = "";
		$this->load->library('lib_func');
		$id_kategori = $this->lib_func->createIdReference('KTG','kategori','id_kategori');
		$data = array(
			'id_kategori' => $id_kategori,
	        'kategori' => $this->input->post('kategori'),
	        'created' => date("Y-m-d H:i:s"),
	        'updated' => date("Y-m-d H:i:s"),
		);

		$simpan = $this->db->insert('kategori', $data);

		if($simpan){
			$result = "success";
			$alert = "Data berhasil disimpan";
		}else{
			$result = "danger";
			$alert = "Data gagal disimpan";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function updateData(){
		$alert = "";
		$result = "";

		$data = array(
	        'kategori' => $this->input->post('kategori'),
	        'updated' => date("Y-m-d H:i:s"),
		);

        $this->db->where("id_kategori", $this->uri->segment(3));
		$simpan = $this->db->update('kategori', $data);

		if($simpan){
			$result = "success";
			$alert = "Data berhasil disimpan";
		}else{
			$result = "danger";
			$alert = "Data gagal disimpan";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function editData(){
		$kdkategori = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM `kategori` WHERE id_kategori = '".$kdkategori."'");

		return $query->result();
	}

	function deleteData(){
		$alert = "";
		$result = "";

		$this->db->where("id_kategori", $this->uri->segment(3));
		$exe = $this->db->delete('kategori');
		if($exe){
			$result = "success";
			$alert = "Data berhasil dihapus";
		}else{
			$result = "danger";
			$alert = "Data gagal dihapus";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

}
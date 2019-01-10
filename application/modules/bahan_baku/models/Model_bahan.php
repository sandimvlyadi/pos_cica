<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Model_produk extends CI_Model {

	function getData(){
		$this->db->select("*");
		$this->db->from('produk');
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function insertData(){
		$alert = "";
		$result = "";

		$data = array(
	        'produk' => $this->input->post('produk'),
	        'created' => date("Y-m-d H:i:s"),
	        'updated' => date("Y-m-d H:i:s"),
		);

		$simpan = $this->db->insert('produk', $data);

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
	        'produk' => $this->input->post('produk'),
	        'updated' => date("Y-m-d H:i:s"),
		);

        $this->db->where("id_produk", $this->uri->segment(3));
		$simpan = $this->db->update('produk', $data);

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
		$kdproduk = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM `produk` WHERE id_produk = '".$kdproduk."'");

		return $query->result();
	}

	function deleteData(){
		$alert = "";
		$result = "";

		$this->db->where("id_produk", $this->uri->segment(3));
		$exe = $this->db->delete('produk');
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
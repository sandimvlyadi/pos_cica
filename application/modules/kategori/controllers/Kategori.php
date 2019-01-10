<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		if($role!="dapur"){
			redirect('dashboard/logout');		
		}
		$this->load->model('model_kategori', 'model');
    }

	public function index()
	{
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('kategori/data_kategori', $v, true);
		$this->load->view('theme_dapur', $data);
	}

	public function add()
	{
		$data['content'] = $this->load->view('kategori/tambah_kategori', '', true);
 		$this->load->view('theme_dapur', $data);
	}

	public function exeAdd()
	{
		$simpan = $this->model->insertData();
		if($simpan['result'] == "success"){
			$this->session->set_flashdata('success', $simpan['alert']);
			redirect('kategori/index');
		}else{
			$this->session->set_flashdata('danger', $simpan['alert']);
			redirect('kategori/add');
		}
	}

	public function edit()
	{
		$v['editData'] = $this->model->editData();
		$data['content'] = $this->load->view('kategori/edit_kategori', $v, true);
 		$this->load->view('theme_dapur', $data);
	}

	public function exeEdit(){
		$simpan = $this->model->updateData();
		if($simpan['result'] == "success"){
			$this->session->set_flashdata('success', $simpan['alert']);
			redirect('kategori/index');
		}else{
			$this->session->set_flashdata('danger', $simpan['alert']);
			redirect('kategori/add');
		}
	}

	public function exeDelete(){
		$delete = $this->model->deleteData();
		if($delete['result'] == "success"){
			$this->session->set_flashdata('success', $delete['alert']);
			redirect('kategori/index');
		}else{
			$this->session->set_flashdata('success', $delete['alert']);
			redirect('kategori/index');
		}
	}
}
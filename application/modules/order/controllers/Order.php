<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		if($role!="kasir"){
			redirect('dashboard/logout');		
		}
		$this->load->model('model_order', 'model');
    }

	public function index()
	{
		$data['kategori'] = $this->model->getKategori();
		
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('order/data_order', $v, true);
		$this->load->view('theme_kasir', $data);
	}

	public function add()
	{
		$data['kategori'] = $this->model->getKategori();

		$this->load->library('lib_func');
		$v['id_pemesanan'] = $this->lib_func->createIdReference('TRN','pemesanan','id_pemesanan');
		$id_kategori = $this->uri->segment(3);
		$v['produk'] = $this->model->getProduk($id_kategori);
		$data['content'] = $this->load->view('order/tambah_order', $v, true);
 		$this->load->view('theme_kasir', $data);
	}

	public function exeAdd()
	{
		$simpan = $this->model->insertData();
		if($simpan['result'] == "success"){
			$this->session->set_flashdata('success', $simpan['alert']);
			redirect('order/index');
		}else{
			$this->session->set_flashdata('danger', $simpan['alert']);
			redirect('order/add');
		}
	}

	public function getDetailProduk(){
		$id_produk = $this->input->get('id_produk');
		$get = $this->model->getDetailProduk($id_produk);
		$promo = $this->model->getPromo();
		//`id_produk`, `nama_produk`, `harga`
		$data = array(
			'id_produk' => $get['id_produk'],
			'nama_produk'=>$get['nama_produk'],
			'harga'=>$get['harga'],
			'promo'=> $promo
		);
		echo json_encode($data);
	}

	// public function getPromo(){
	// 	$promo = $this->model->getPromo();
	// 	$json = array();
	// 	foreach($promo as $d){
	// 		$mulai = date($d['start_date']); // waktu mulai
	// 		$exp = date($d['end_date']); // batas waktu
	// 		if ((strtotime($mulai) <= date('Y-m-d') AND date('Y-m-d') >= strtotime($exp))) {
	// 		echo $d['nama_promo']."-<b>Berlaku</b><br/>";
	// 		} else {
	// 		echo $d['nama_promo']."-<b>Belum Berlaku</b><br/>";
	// 		}
	// 	}
	// }

	

	public function getDataOrder(){
		$id_pemesanan = $this->input->get('id_pemesanan');
		$get = $this->model->getDataOrder($id_pemesanan);
		echo json_encode($get);
	}

	public function deleteDetailOrder(){
		$id_detail_pemesanan = $this->input->post('id_detail_pemesanan');
		$get = $this->model->deleteDetailOrder($id_detail_pemesanan);
		echo json_encode($get);
	}

	public function insertDetailPemesanan(){
		$get = $this->model->insertDetailPemesanan();
		echo json_encode($get);
	}

	public function detail($id_pemesanan)
	{
		$data['kategori'] = $this->model->getKategori();

		$v['order'] = $this->model->getDataDetail($id_pemesanan);
		$v['detail_order'] = $this->model->getDataOrder($id_pemesanan);
		$data['content'] = $this->load->view('order/detail_order', $v, true);
 		$this->load->view('theme_kasir', $data);
	}

	public function edit()
	{
		$v['editData'] = $this->model->editData();
		$data['content'] = $this->load->view('order/edit_order', $v, true);
 		$this->load->view('theme_kasir', $data);
	}

	public function exeEdit(){
		$simpan = $this->model->updateData();
		if($simpan['result'] == "success"){
			$this->session->set_flashdata('success', $simpan['alert']);
			redirect('order/index');
		}else{
			$this->session->set_flashdata('danger', $simpan['alert']);
			redirect('order/add');
		}
	}

	public function exeDelete(){
		$delete = $this->model->deleteData();
		if($delete['result'] == "success"){
			$this->session->set_flashdata('success', $delete['alert']);
			redirect('order/index');
		}else{
			$this->session->set_flashdata('success', $delete['alert']);
			redirect('order/index');
		}
	}

	public function cekProduk()
	{
		$params = array('id_produk' => $this->input->post('id_produk'), 
						'qty'		=> $this->input->post('qty')
					);
		$result = $this->model->cekProduk($params);

		echo json_encode($result);
	}
}
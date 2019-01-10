<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		if($role!="dapur"){
			redirect('dashboard/logout');		
		}
		$this->load->model('model_produk', 'model');
    }

	public function index()
	{
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('produk/data_produk', $v, true);
		$this->load->view('theme_dapur', $data);
	}

	public function add()
	{
		$this->load->library('lib_func');
		$v['id_detail'] = $this->lib_func->createIdReference('DP','detail_produk','id_detail');
		$v['id_produk'] = $this->lib_func->createIdReference('PD','produk','id_produk');
		$v['kategori'] = $this->model->getKategori();
		$v['bahan_baku'] = $this->model->getBahanBaku();
		$data['content'] = $this->load->view('produk/tambah_produk', $v, true);
 		$this->load->view('theme_dapur', $data);
	}

	public function insertBahanBaku(){
		$id_bahan_baku = $this->input->post('id_bahan_baku');
		$qty = $this->input->post('qty');
		$get = $this->model->insertBahanBaku($id_bahan_baku, $qty);
		echo json_encode($get);
	}

	public function getDetailProduk(){
		$id_produk = $this->input->get('id_produk');
		$get = $this->model->getDetailProduk($id_produk);
		echo json_encode($get);
	}

	public function deleteDetail(){
		$id_detail = $this->input->post('id_detail');
		$get = $this->model->deleteDetail($id_detail);
		echo json_encode($get);
	}

	public function exeAdd()
	{
		$simpan = $this->model->insertData();
		if($simpan['result'] == "success"){
			$this->session->set_flashdata('success', $simpan['alert']);
			redirect('produk/index');
		}else{
			$this->session->set_flashdata('danger', $simpan['alert']);
			redirect('produk/add');
		}
	}

	public function edit()
	{
		$this->load->library('lib_func');
		$v['id_detail'] = $this->lib_func->createIdReference('DP','detail_produk','id_detail');
		$v['id_produk'] = $this->lib_func->createIdReference('PD','produk','id_produk');
		$v['kategori'] = $this->model->getKategori();
		$v['bahan_baku'] = $this->model->getBahanBaku();
		$v['produk'] = $this->model->editData();
		$data['content'] = $this->load->view('produk/edit_produk', $v, true);
 		$this->load->view('theme_dapur', $data);
	}

	public function detail()
	{
		$v['produk'] = $this->model->editData();
		$v['dproduk'] = $this->model->editDproduk();
		$data['content'] = $this->load->view('produk/detail_produk', $v, true);
 		$this->load->view('theme_dapur', $data);
	}

	public function exeEdit(){
		$simpan = $this->model->updateData();
		if($simpan['result'] == "success"){
			$this->session->set_flashdata('success', $simpan['alert']);
			redirect('produk/index');
		}else{
			$this->session->set_flashdata('danger', $simpan['alert']);
			redirect('produk/add');
		}
	}

	public function exeDelete(){
		$delete = $this->model->deleteData();
		if($delete['result'] == "success"){
			$this->session->set_flashdata('success', $delete['alert']);
			redirect('produk/index');
		}else{
			$this->session->set_flashdata('success', $delete['alert']);
			redirect('produk/index');
		}
	}

	public function export()
	{
		$data = $this->model->getDataExport();

		/** Error reporting */
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Asia/Jakarta');
		define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
		date_default_timezone_set('Asia/Jakarta');
		
		// Read existing template
		$inputFileName 	= './uploads/template/template_produk_list.xlsx';
		$inputFileType 	= PHPExcel_IOFactory::identify($inputFileName);
		$objReader 		= PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel 	= $objReader->load($inputFileName);
		$setValue		= $objPHPExcel->getActiveSheet();

		$n = count($data);
		$col = $n;
		for ($i=0; $i < $n; $i++) { 
			$setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
			$setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_produk']);
			$setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['nama_produk']);
			$setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['kategori']);
			$setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['harga']);
			$setValue->setCellValueByColumnAndRow(6, $i+12, $data[$i]['created']);
			$col = $i + 12 + 3;
		}

		$setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Save Excel 2007 file
		$callStartTime = microtime(true);
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		$filename = 'product_list_'. date('YmdHis') .'.xlsx';
		$objWriter->save('./uploads/export/'. $filename);

		//redirect('./uploads/export/'. $filename);

		$params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN DAFTAR PRODUK';
        $params['thead'] = array('No.', 'ID Produk', 'Nama Produk', 'Kategori', 'Harga', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/produk', $params);
	}
}
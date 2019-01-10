<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_dapur extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		if($role!="dapur"){
			redirect('dashboard/logout');		
		}
		$this->load->model('model_order_dapur', 'model');
    }

	public function index()
	{
		$data['kategori'] = $this->model->getKategori();
		
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('order_dapur/data_order_dapur', $v, true);
		$this->load->view('theme_dapur', $data);
	}

	// public function add()
	// {
	// 	$data['kategori'] = $this->model->getKategori();

	// 	$this->load->library('lib_func');
	// 	$v['id_pemesanan'] = $this->lib_func->createIdReference('TRN','pemesanan','id_pemesanan');
	// 	$id_kategori = $this->uri->segment(3);
	// 	$v['produk'] = $this->model->getProduk($id_kategori);
	// 	$data['content'] = $this->load->view('order_dapur/tambah_order_dapur', $v, true);
 // 		$this->load->view('theme_dapur', $data);
	// }

	// public function exeAdd()
	// {
	// 	$simpan = $this->model->insertData();
	// 	if($simpan['result'] == "success"){
	// 		$this->session->set_flashdata('success', $simpan['alert']);
	// 		redirect('order_dapur/index');
	// 	}else{
	// 		$this->session->set_flashdata('danger', $simpan['alert']);
	// 		redirect('order_dapur/add');
	// 	}
	// }

	public function getDetailProduk(){
		$id_produk = $this->input->get('id_produk');
		$get = $this->model->getDetailProduk($id_produk);
		echo json_encode($get);
	}

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

	public function notif(){
		$get = $this->model->notif();
		echo json_encode($get);
	}

	public function detail($id_pemesanan)
	{
		$v['order'] = $this->model->getDataDetail($id_pemesanan);
		$v['detail_order'] = $this->model->getDataOrder($id_pemesanan);
		$data['content'] = $this->load->view('order_dapur/detail_order_dapur', $v, true);
 		$this->load->view('theme_dapur', $data);
	}

	// public function edit()
	// {
	// 	$v['editData'] = $this->model->editData();
	// 	$data['content'] = $this->load->view('order_dapur/edit_order_dapur', $v, true);
 // 		$this->load->view('theme_dapur', $data);
	// }

	// public function exeEdit(){
	// 	$simpan = $this->model->updateData();
	// 	if($simpan['result'] == "success"){
	// 		$this->session->set_flashdata('success', $simpan['alert']);
	// 		redirect('order_dapur/index');
	// 	}else{
	// 		$this->session->set_flashdata('danger', $simpan['alert']);
	// 		redirect('order_dapur/add');
	// 	}
	// }

	// public function exeDelete(){
	// 	$delete = $this->model->deleteData();
	// 	if($delete['result'] == "success"){
	// 		$this->session->set_flashdata('success', $delete['alert']);
	// 		redirect('order_dapur/index');
	// 	}else{
	// 		$this->session->set_flashdata('success', $delete['alert']);
	// 		redirect('order_dapur/index');
	// 	}
	// }

	function export_bulan()
    {
        $data = $this->model->getExportBulan();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_order_list.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_pemesanan']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['pelanggan']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['total_order']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['total']);
            $setValue->setCellValueByColumnAndRow(6, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'order_list_bulanan_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN DAFTAR ORDER';
        $params['thead'] = array('No.', 'ID Pemesanan', 'Nama Pelanggan', 'Total Order', 'Sub Total', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/order_dapur', $params);
    }

    function export_tahun()
    {
        $data = $this->model->getExportTahun();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_order_list.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_pemesanan']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['pelanggan']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['total_order']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['total']);
            $setValue->setCellValueByColumnAndRow(6, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'order_list_tahunan_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN DAFTAR ORDER';
        $params['thead'] = array('No.', 'ID Pemesanan', 'Nama Pelanggan', 'Total Order', 'Sub Total', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/order_dapur', $params);
    }

    function export_triwulan()
    {
        $data = $this->model->getExportTriwulan();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_order_list.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_pemesanan']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['pelanggan']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['total_order']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['total']);
            $setValue->setCellValueByColumnAndRow(6, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'order_list_triwulan_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN DAFTAR ORDER';
        $params['thead'] = array('No.', 'ID Pemesanan', 'Nama Pelanggan', 'Total Order', 'Sub Total', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/order_dapur', $params);
    }

}
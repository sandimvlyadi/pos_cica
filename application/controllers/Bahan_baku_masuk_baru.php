<?php
 
class Bahan_baku_masuk_baru extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if($role!="dapur"){
            redirect('dashboard/logout');       
        }
        $this->load->model('Bahan_baku_masuk_baru_model');
    } 

    /*
     * Listing of bahan_baku_masuk
     */
    function index()
    {
        $v['bahan_baku_masuk'] = $this->Bahan_baku_masuk_baru_model->get_all_produk();
        
        $data['content'] = $this->load->view('bahan_baku_masuk_baru/index', $v, true);
        $this->load->view('theme_dapur',$data);
    }

    /*
     * Adding a new bahan_baku_masuk
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $tgl_produk = $this->input->post('tgl_produk');
            $id_produk  = $this->input->post('id_produk');
            $stok_baru  = $this->input->post('stok_baru');
            $sisa_stok  = $this->input->post('sisa_stok');

            $params = array(
				'tgl_produk'    => $tgl_produk,
                'id_produk'     => $id_produk,
                'stok_baru'     => $stok_baru + $sisa_stok
            );

            $this->Bahan_baku_masuk_baru_model->add_produk_update($params);
            
            redirect('bahan_baku_masuk_baru/index');
        }
        else
        {  
            $v['bahan_baku'] = $this->Bahan_baku_masuk_baru_model->get_bahan_baku();          
            $data['content'] = $this->load->view('bahan_baku_masuk_baru/add', $v, true);
            $this->load->view('theme_dapur',$data);
        }
    }  

    /*
     * Editing a bahan_baku_masuk
     */
    function edit($id_bahan_baku_masuk)
    {   
        // check if the bahan_baku_masuk exists before trying to edit it
        $data['bahan_baku_masuk'] = $this->Bahan_baku_masuk_model->get_bahan_baku_masuk($id_bahan_baku_masuk);
        
        if(isset($data['bahan_baku_masuk']['id_bahan_baku_masuk']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_bahan_baku' => $this->input->post('id_bahan_baku'),
					'supplier' => $this->input->post('supplier'),
					'lokasi' => $this->input->post('lokasi'),
					'harga_satuan' => $this->input->post('harga_satuan'),
					'qty' => $this->input->post('qty'),
					'tgl_beli' => $this->input->post('tgl_beli'),
                );

                $this->Bahan_baku_masuk_model->update_bahan_baku_masuk($id_bahan_baku_masuk,$params);            
                redirect('bahan_baku_masuk/index');
            }
            else
            {
                $data['_view'] = 'bahan_baku_masuk/edit';
                $this->load->view('theme_dapur',$data);
            }
        }
        else
            show_error('The bahan_baku_masuk you are trying to edit does not exist.');
    } 

    /*
     * Deleting bahan_baku_masuk
     */
    function remove($id_bahan_baku_masuk)
    {
        $bahan_baku_masuk = $this->Bahan_baku_masuk_baru_model->get_produk_update_detail($id_bahan_baku_masuk);


        // check if the bahan_baku_masuk exists before trying to delete it
        if(isset($bahan_baku_masuk[0]['id_produk_update']))
        {
            $id_bahan_baku = $bahan_baku_masuk[0]['id_produk_update'];
            $this->Bahan_baku_masuk_baru_model->delete_produk($id_bahan_baku);
            redirect('bahan_baku_masuk_baru/index');
        }
        else
            show_error('The bahan_baku_masuk you are trying to delete does not exist.');
    }

    function loadBahanBaku()
    {
        $id_produk = $this->input->post('id_produk');

        $data = $this->Bahan_baku_masuk_baru_model->loadBahanBaku($id_produk);

        echo json_encode($data);
    }

    function loadStok()
    {
        $id_produk = $this->input->post('id_produk');

        $data = $this->Bahan_baku_masuk_baru_model->loadStok($id_produk);

        echo json_encode($data);
    }

    function export_bulan()
    {
        $data = $this->Bahan_baku_masuk_baru_model->getExportBulan();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku_masuk.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku_masuk']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['qty']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['tgl_beli']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_masuk_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN BAHAN BAKU MASUK';
        $params['thead'] = array('No.', 'ID Bahan Baku Masuk', 'Bahan Baku', 'QTY', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bbm', $params);
    }

    function export_tahun()
    {
        $data = $this->Bahan_baku_masuk_baru_model->getExportTahun();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku_masuk.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku_masuk']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['qty']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['tgl_beli']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_masuk_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN BAHAN BAKU MASUK';
        $params['thead'] = array('No.', 'ID Bahan Baku Masuk', 'Bahan Baku', 'QTY', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bbm', $params);
    }

    function export_triwulan()
    {
        $data = $this->Bahan_baku_masuk_baru_model->getExportTriwulan();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku_masuk.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku_masuk']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['qty']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['tgl_beli']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_masuk_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN BAHAN BAKU MASUK';
        $params['thead'] = array('No.', 'ID Bahan Baku Masuk', 'Bahan Baku', 'QTY', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bbm', $params);
    }
    
}
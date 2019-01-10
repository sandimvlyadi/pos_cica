<?php

class Bahan_baku_keluar_baru extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bahan_baku_keluar_baru_model');
    } 

    /*
     * Listing of bahan_baku_keluar
     */
    function index()
    {
        $v['bahan_baku_keluar'] = $this->Bahan_baku_keluar_baru_model->get_all_bahan_baku_keluar();
        
        $data['content'] = $this->load->view('bahan_baku_keluar_baru/index', $v, true);
        $this->load->view('theme_dapur',$data);
    }

    /*
     * Adding a new bahan_baku_keluar
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_bahan_baku' => $this->input->post('id_bahan_baku'),
				'id_produk' => $this->input->post('id_produk'),
				'qty' => $this->input->post('qty'),
				'satuan' => $this->input->post('satuan'),
				'created' => $this->input->post('created'),
				'updated' => $this->input->post('updated'),
            );
            
            $bahan_baku_keluar_id = $this->Bahan_baku_keluar_model->add_bahan_baku_keluar($params);
            redirect('bahan_baku_keluar/index');
        }
        else
        {            
            $data['_view'] = 'bahan_baku_keluar/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a bahan_baku_keluar
     */
    function edit($id_bahan_baku_keluar)
    {   
        // check if the bahan_baku_keluar exists before trying to edit it
        $data['bahan_baku_keluar'] = $this->Bahan_baku_keluar_model->get_bahan_baku_keluar($id_bahan_baku_keluar);
        
        if(isset($data['bahan_baku_keluar']['id_bahan_baku_keluar']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_bahan_baku' => $this->input->post('id_bahan_baku'),
					'id_produk' => $this->input->post('id_produk'),
					'qty' => $this->input->post('qty'),
					'satuan' => $this->input->post('satuan'),
					'created' => $this->input->post('created'),
					'updated' => $this->input->post('updated'),
                );

                $this->Bahan_baku_keluar_model->update_bahan_baku_keluar($id_bahan_baku_keluar,$params);            
                redirect('bahan_baku_keluar/index');
            }
            else
            {
                $data['_view'] = 'bahan_baku_keluar/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The bahan_baku_keluar you are trying to edit does not exist.');
    } 

    /*
     * Deleting bahan_baku_keluar
     */
    function remove($id_bahan_baku_keluar)
    {
        $bahan_baku_keluar = $this->Bahan_baku_keluar_model->get_bahan_baku_keluar($id_bahan_baku_keluar);

        // check if the bahan_baku_keluar exists before trying to delete it
        if(isset($bahan_baku_keluar['id_bahan_baku_keluar']))
        {
            $this->Bahan_baku_keluar_model->delete_bahan_baku_keluar($id_bahan_baku_keluar);
            redirect('bahan_baku_keluar/index');
        }
        else
            show_error('The bahan_baku_keluar you are trying to delete does not exist.');
    }

    function export_bulan()
    {
        $data = $this->Bahan_baku_keluar_baru_model->getExportBulan();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku_keluar.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku_keluar']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['qty']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_keluar_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN BAHAN BAKU KELUAR';
        $params['thead'] = array('No.', 'ID Bahan Baku Keluar', 'Bahan Baku', 'QTY', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bbk', $params);
    }

    function export_tahun()
    {
        $data = $this->Bahan_baku_keluar_baru_model->getExportTahun();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku_keluar.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku_keluar']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['qty']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_keluar_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN BAHAN BAKU KELUAR';
        $params['thead'] = array('No.', 'ID Bahan Baku Keluar', 'Bahan Baku', 'QTY', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bbk', $params);
    }

    function export_triwulan()
    {
        $data = $this->Bahan_baku_keluar_baru_model->getExportTriwulan();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku_keluar.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku_keluar']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['qty']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_keluar_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN BAHAN BAKU KELUAR';
        $params['thead'] = array('No.', 'ID Bahan Baku Keluar', 'Bahan Baku', 'QTY', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bbk', $params);
    }
    
}

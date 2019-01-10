<?php
class Bahan_baku extends MX_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bahan_baku_model');
    } 

    /*
     * Listing of bahan_baku
     */
    function index()
    {
        $data['bahan_baku'] = $this->Bahan_baku_model->get_all_bahan_baku();
        
        $view['content'] = $this->load->view('index',$data, true );
        $this->load->view('theme_dapur',$view);
    }

    /*
     * Adding a new bahan_baku
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $this->load->library('lib_func');
            $id = $this->lib_func->createIdReference('BHN','bahan_baku','id_bahan_baku');
            $params = array(
                'id_bahan_baku'=>$id,
				'bahan_baku' => $this->input->post('bahan_baku'),
				'satuan' => $this->input->post('satuan'),
				'created' => date("Y-m-d H:i:s"),
                'updated' => date("Y-m-d H:i:s"),
            );
            
            $bahan_baku_id = $this->Bahan_baku_model->add_bahan_baku($params);
            redirect('bahan_baku/index');
        }
        else
        {   
            $data['content'] = $this->load->view('add','', true ); 
            $this->load->view('theme_dapur',$data);
        }
    }  

    /*
     * Editing a bahan_baku
     */
    function edit($id_bahan_baku)
    {   
        // check if the bahan_baku exists before trying to edit it
        $data['bahan_baku'] = $this->Bahan_baku_model->get_bahan_baku($id_bahan_baku);
        
        if(isset($data['bahan_baku']['id_bahan_baku']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'bahan_baku' => $this->input->post('bahan_baku'),
					'satuan' => $this->input->post('satuan'),
                    'updated' => date("Y-m-d H:i:s"),
                );

                $this->Bahan_baku_model->update_bahan_baku($id_bahan_baku,$params);            
                redirect('bahan_baku/index');
            }
            else
            {
                $view['content'] = $this->load->view('edit',$data, true ); 
                $this->load->view('theme_dapur',$view);
            }
        }
        else
            show_error('The bahan_baku you are trying to edit does not exist.');
    } 

    /*
     * Deleting bahan_baku
     */
    function remove($id_bahan_baku)
    {
        $bahan_baku = $this->Bahan_baku_model->get_bahan_baku($id_bahan_baku);

        // check if the bahan_baku exists before trying to delete it
        if(isset($bahan_baku['id_bahan_baku']))
        {
            $this->Bahan_baku_model->delete_bahan_baku($id_bahan_baku);
            redirect('bahan_baku/index');
        }
        else
            show_error('The bahan_baku you are trying to delete does not exist.');
    }

    public function export()
    {
        $data = $this->Bahan_baku_model->getDataExport();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Jakarta');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Asia/Jakarta');
        
        // Read existing template
        $inputFileName  = './uploads/template/template_bahan_baku.xlsx';
        $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
        $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel    = $objReader->load($inputFileName);
        $setValue       = $objPHPExcel->getActiveSheet();

        $n = count($data);
        $col = $n;
        for ($i=0; $i < $n; $i++) { 
            $setValue->setCellValueByColumnAndRow(1, $i+12, $i+1);
            $setValue->setCellValueByColumnAndRow(2, $i+12, $data[$i]['id_bahan_baku']);
            $setValue->setCellValueByColumnAndRow(3, $i+12, $data[$i]['bahan_baku']);
            $setValue->setCellValueByColumnAndRow(4, $i+12, $data[$i]['satuan']);
            $setValue->setCellValueByColumnAndRow(5, $i+12, $data[$i]['created']);
            $col = $i + 12 + 3;
        }

        $setValue->setCellValueByColumnAndRow(1, $col, 'Tanggal Cetak : '. date('d/M/Y'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save Excel 2007 file
        $callStartTime = microtime(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $filename = 'bahan_baku_'. date('YmdHis') .'.xlsx';
        $objWriter->save('./uploads/export/'. $filename);

        //redirect('./uploads/export/'. $filename);

        $params['logo']  = base_url('assets/report/logo.png');
        $params['title'] = 'LAPORAN DAFTAR BAHAN BAKU';
        $params['thead'] = array('No.', 'ID Bahan Baku', 'Bahan Baku', 'Satuan', 'Tanggal');
        $params['tbody'] = $data;
        $this->load->view('report/bahan_baku', $params);
    }
    
}

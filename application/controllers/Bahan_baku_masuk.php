<?php
 
class Bahan_baku_masuk extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if($role!="dapur"){
            redirect('dashboard/logout');       
        }
        $this->load->model('Bahan_baku_masuk_model');
    } 

    /*
     * Listing of bahan_baku_masuk
     */
    function index()
    {
        $v['bahan_baku_masuk'] = $this->Bahan_baku_masuk_model->get_all_bahan_baku_masuk();
        
        $data['content'] = $this->load->view('bahan_baku_masuk/index', $v, true);
        $this->load->view('theme_dapur',$data);
    }

    /*
     * Adding a new bahan_baku_masuk
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $id_bahan_baku = $this->input->post('id_bahan_baku');

            $this->load->library('lib_func');
            $id = $this->lib_func->createIdReference('BBM','bahan_baku_masuk','id_bahan_baku_masuk');
            $params = array(
				'id_bahan_baku_masuk' => $id,
                'id_bahan_baku' => $this->input->post('id_bahan_baku'),
				'supplier' => $this->input->post('supplier'),
				'lokasi' => $this->input->post('lokasi'),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'qty' => $this->input->post('qty'),
				'tgl_beli' => $this->input->post('tgl_beli'),
            );

            $bahan_baku = $this->Bahan_baku_masuk_model->get_bahan_baku2($id_bahan_baku);
            $stok = $bahan_baku['stok'] + $this->input->post('qty');
            $params2 = array(
                'stok' => $stok,
                'updated' => date('Y-m-d')
            );

            $stok_update = $this->Bahan_baku_masuk_model->update_bahan_baku($id_bahan_baku, $params2);
            
            $bahan_baku_masuk_id = $this->Bahan_baku_masuk_model->add_bahan_baku_masuk($params);
            redirect('bahan_baku_masuk/index');
        }
        else
        {  
            $v['bahan_baku'] = $this->Bahan_baku_masuk_model->get_bahan_baku();          
            $data['content'] = $this->load->view('bahan_baku_masuk/add', $v, true);
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
        $bahan_baku_masuk = $this->Bahan_baku_masuk_model->get_bahan_baku_masuk($id_bahan_baku_masuk);


        // check if the bahan_baku_masuk exists before trying to delete it
        if(isset($bahan_baku_masuk['id_bahan_baku_masuk']))
        {
            $id_bahan_baku = $bahan_baku_masuk['id_bahan_baku'];
            $qty = $this->uri->segment(5);
            $bahan_baku = $this->Bahan_baku_masuk_model->get_bahan_baku2($id_bahan_baku);
            $stok = $bahan_baku['stok'] - $qty;
            $params2 = array(
                'stok' => $stok,
                'updated' => date('Y-m-d')
            );

            $stok_update = $this->Bahan_baku_masuk_model->update_bahan_baku($id_bahan_baku, $params2);

            $this->Bahan_baku_masuk_model->delete_bahan_baku_masuk($id_bahan_baku_masuk);
            redirect('bahan_baku_masuk/index');
        }
        else
            show_error('The bahan_baku_masuk you are trying to delete does not exist.');
    }
    
}

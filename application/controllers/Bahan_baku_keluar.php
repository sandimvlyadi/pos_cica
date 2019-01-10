<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Bahan_baku_keluar extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bahan_baku_keluar_model');
    } 

    /*
     * Listing of bahan_baku_keluar
     */
    function index()
    {
        $data['bahan_baku_keluar'] = $this->Bahan_baku_keluar_model->get_all_bahan_baku_keluar();
        
        $data['_view'] = 'bahan_baku_keluar/index';
        $this->load->view('layouts/main',$data);
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
    
}
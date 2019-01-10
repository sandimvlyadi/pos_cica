<?php
 
class Promo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if($role!="dapur"){
            redirect('dashboard/logout');       
        }
        $this->load->model('Promo_model');
    } 

    /*
     * Listing of promo
     */
    function index()
    {
        $v['promo'] = $this->Promo_model->get_all_promo();
        
        $data['content'] = $this->load->view('promo/index', $v, true);
        $this->load->view('theme_dapur',$data);
    }

    /*
     * Adding a new promo
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $this->load->library('lib_func');
            $id = $this->lib_func->createIdReference('PM','promo','id_promo');
            $params = array(
                'id_promo'=> $id,
				'nama_promo' => $this->input->post('nama_promo'),
				'tipe_promo' => $this->input->post('tipe_promo'),
				'potongan_harga' => $this->input->post('potongan_harga'),
				'diskon' => $this->input->post('diskon'),
				'created' => date("Y-m-d H:i:s"),
                'updated' => date("Y-m-d H:i:s"),
				'status' => $this->input->post('status'),
            );
            
            $promo_id = $this->Promo_model->add_promo($params);
            redirect('promo/index');
        }
        else
        {            
            $data['content'] = $this->load->view('promo/add', '', true);
            $this->load->view('theme_dapur',$data);
        }
    }  

    /*
     * Editing a promo
     */
    function edit($id_promo)
    {   
        // check if the promo exists before trying to edit it
        $v['promo'] = $this->Promo_model->get_promo($id_promo);
        
        if(isset($v['promo']['id_promo']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                // $diskon = "";
                // $potongan_harga = "";
                // if(empty($_POST['tipe_promo']=="Diskon") && !empty($_POST['tipe_promo']=="Potongan Harga")){
                //     $potongan_harga = $this->input->post('potongan_harga');
                //     $diskon = "";
                // }else{
                //     $diskon = $this->input->post('diskon');
                //     $potongan_harga = "";
                //}
                
                $params = array(
					'nama_promo' => $this->input->post('nama_promo'),
					'tipe_promo' => $this->input->post('tipe_promo'),
					'potongan_harga' => $this->input->post('potongan_harga'),
					'diskon' => $this->input->post('diskon'),
					'updated' => date("Y-m-d H:i:s"),
					'status' => $this->input->post('status'),
                );

                $this->Promo_model->update_promo($id_promo,$params);            
                redirect('promo/index');
            }
            else
            {
                $data['content'] = $this->load->view('promo/edit', $v, true);
                $this->load->view('theme_dapur',$data);
            }
        }
        else
            show_error('The promo you are trying to edit does not exist.');
    } 

    /*
     * Deleting promo
     */
    function remove($id_promo)
    {
        $promo = $this->Promo_model->get_promo($id_promo);

        // check if the promo exists before trying to delete it
        if(isset($promo['id_promo']))
        {
            $this->Promo_model->delete_promo($id_promo);
            redirect('promo/index');
        }
        else
            show_error('The promo you are trying to delete does not exist.');
    }
    
}

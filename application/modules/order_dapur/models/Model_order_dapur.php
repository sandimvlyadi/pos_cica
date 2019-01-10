<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Model_order_dapur extends CI_Model {

	function getData(){
		$this->db->select("*");
		$this->db->from('pemesanan');
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function getDataDetail($id_pemesanan){
		$query = $this->db->query("SELECT * FROM `pemesanan` WHERE id_pemesanan = '".$id_pemesanan."'");
		return $query->result();
	}

	function getDataOrder($id_pemesanan){
		$this->db->select("*");
		$this->db->from('detail_pemesanan');
		$this->db->where('id_pemesanan', $id_pemesanan);
		$this->db->join('produk', 'detail_pemesanan.id_produk = produk.id_produk');
		$this->db->order_by('detail_pemesanan.created DESC');
		return $this->db->get()->result();
	}

	function getDetailProduk($id_produk){
		$this->db->select("*");
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->result();
	}

	function getKategori(){
		$this->db->select("*");
		$this->db->from('kategori');
		// if($this->uri->segment(3)!=""){
		// 	$this->db->where('id_kategori', $this->uri->segment(3));
		// }
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function getProduk($id_kategori){
		$this->db->select("*");
		$this->db->from('produk');
		if(!empty($id_kategori)){
			$this->db->where('id_kategori', $id_kategori);
		}
		$this->db->order_by('id_produk DESC');
		return $this->db->get()->result();
	}

	function insertData(){
		$alert = "";
		$result = "";

		//`id_pemesanan`, `author`, `pelanggan`, `no_meja`, `total`, `total_order`, `catatan`, `created`, `updated`
		$data = array(
	        'id_pemesanan' => $this->input->post('id_pemesanan'),
	        'author' => $this->session->userdata('username'),
	        'pelanggan' => $this->input->post('pelanggan'),
	        'no_meja'=> $this->input->post('no_meja'),
	        'total'=>$this->input->post('txtTotal'),
	        'total_order'=>$this->input->post('total_order'),
	        'catatan'=>$this->input->post('catatan'),
	        'created' => date("Y-m-d H:i:s"),
	        'updated' => date("Y-m-d H:i:s"),
		);

		$simpan = $this->db->insert('pemesanan', $data);

		if($simpan){
			$result = "success";
			$alert = "Data berhasil disimpan";
		}else{
			$result = "danger";
			$alert = "Data gagal disimpan";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function insertDetailPemesanan(){
		$alert = "";
		$result = "";
		//`id_detal_pemesanan`, `id_pemesanan`, `id_produk`, `qty_beli`, `sub_total`, `created`, `updated`, `promo`, `potongan_harga`
		$this->load->library('lib_func');
		$id_pemesanan = $this->lib_func->createIdReference('TRN','pemesanan','id_pemesanan');
		$id_detail_pemesanan = $this->lib_func->createIdReference('DTN','detail_pemesanan','id_detail_pemesanan');

		$sub_total = $this->input->post('qty_beli') * $this->input->post('harga');
		$data = array(
	        'id_detail_pemesanan' => $id_detail_pemesanan,
	        'id_pemesanan' => $id_pemesanan,
	        'id_produk' => $this->input->post('id_produk'),
	        'qty_beli' => $this->input->post('qty_beli'),
	        'sub_total' => $sub_total,
	        'created' => date("Y-m-d H:i:s"),
	        'updated' => date("Y-m-d H:i:s"),
		);

		$simpan = $this->db->insert('detail_pemesanan', $data);

		if($simpan){
			$result = "success";
			$alert = "Data berhasil disimpan";
		}else{
			$result = "danger";
			$alert = "Data gagal disimpan";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function updateData(){
		$alert = "";
		$result = "";

		$data = array(
	        'order' => $this->input->post('order'),
	        'updated' => date("Y-m-d H:i:s"),
		);

        $this->db->where("id_order", $this->uri->segment(3));
		$simpan = $this->db->update('order', $data);

		if($simpan){
			$result = "success";
			$alert = "Data berhasil disimpan";
		}else{
			$result = "danger";
			$alert = "Data gagal disimpan";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function editData(){
		$kdorder = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM `pemesanan` WHERE id_pemesanan = '".$kdorder."'");
		return $query->result();
	}

	function deleteData(){
		$alert = "";
		$result = "";

		$this->db->where("id_order", $this->uri->segment(3));
		$exe = $this->db->delete('order');
		if($exe){
			$result = "success";
			$alert = "Data berhasil dihapus";
		}else{
			$result = "danger";
			$alert = "Data gagal dihapus";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function deleteDetailOrder($id_detail_pemesanan){
		$alert = "";
		$result = "";

		$this->db->where("id_detail_pemesanan", $id_detail_pemesanan);
		$exe = $this->db->delete('detail_pemesanan');
		if($exe){
			$result = "success";
			$alert = "Data berhasil dihapus";
		}else{
			$result = "danger";
			$alert = "Data gagal dihapus";
		}

		$return = array(
			"result" => $result,
			"alert" => $alert
		);

		return $return;
	}

	function notif(){
		if(isset($_POST['view'])){

		if($_POST["view"] != '')
		{
		    $update_query = "UPDATE pemesanan SET notif = '1' WHERE notif='0'";
		    $this->db->query($update_query);
		}
		$query = "SELECT * FROM pemesanan ORDER BY id_pemesanan DESC LIMIT 5";
		$result = $this->db->query($query);
		$output = '';
		if($result->num_rows() > 0)
		{
		$fetch = $result->result_array();
		 foreach($fetch as $row)
		 {
		   $output .= '
		   <li>
		   <a href="'.site_url().'order_dapur/detail/'.$row['id_pemesanan'].'">
		   <strong>('.$row['id_pemesanan'].') '.$row["pelanggan"].' - No Meja : '.$row['no_meja'].'</strong><br />
		   <small><em>Total order : '.$row["total_order"].'</em></small>
		   </a>
		   </li>
		   ';

		 }
		}
		else{
		     $output .= '
		     <li><a href="#" class="text-bold text-italic">No Notif Found</a></li>';
		}



		$status_query = "SELECT * FROM pemesanan WHERE notif=0";
		$result_query = $this->db->query($status_query);
		$count = $result_query->num_rows();
		$data = array(
		    'notification' => $output,
		    'unseen_notification'  => $count
		);

		return $data;

		}else{
			return "0";
		}
	}

	function getExportBulan()
    {
        $q =    "SELECT 
                    *
                FROM 
                    `pemesanan`
                WHERE 
                    MONTH(`created`) = MONTH('". date('Y-m-d') ."');
                ";
        $r = $this->db->query($q, false)->result_array();

        return $r;
    }

    function getExportTahun()
    {
        $q =    "SELECT 
                    *
                FROM 
                    `pemesanan`
                WHERE 
                    YEAR(`created`) = YEAR('". date('Y-m-d') ."');
                ";
        $r = $this->db->query($q, false)->result_array();

        return $r;
    }

    function getExportTriwulan()
    {
    	$y = date('Y');
    	$m = date('m');
    	$range = '';
    	if ($m < 3) {
    		if ($m == 2) {
    			$range = '12,1,2';
    		} else{
    			$range = '11,12,1';
    		}
    	} else{
    		$range = ($m-2). ',' . ($m-1). ',' . $m;
    	}

        $q =    "SELECT 
                    *
                FROM 
                    `pemesanan`
                WHERE 
                    MONTH(`created`) IN (". $range .");
                ";
        $r = $this->db->query($q, false)->result_array();

        return $r;
    }

}
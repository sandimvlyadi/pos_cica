<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Model_order extends CI_Model {

	function getData(){
		$this->db->select("*");
		$this->db->from('pemesanan');
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function getPromo(){
		$now = date("Y-m-d");
		$this->db->select("*");
		$this->db->from('promo');
		$this->db->where("status = 'Aktif'");
		$this->db->order_by('created DESC');
		return $this->db->get()->result_array();
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
		return $this->db->get()->row_array();
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
	        'notif' => '0'
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
		$nama_promo = "";
		$potongan_harga = "";
		$tipe_promo = "";
		//`id_detal_pemesanan`, `id_pemesanan`, `id_produk`, `qty_beli`, `sub_total`, `created`, `updated`, `promo`, `potongan_harga`
		$this->load->library('lib_func');
		$id_pemesanan = $this->lib_func->createIdReference('TRN','pemesanan','id_pemesanan');
		$id_detail_pemesanan = $this->lib_func->createIdReference('DTN','detail_pemesanan','id_detail_pemesanan');

		$promo = $this->input->post('promo');
		if(!empty($promo)){
			$q = $this->db->query("SELECT * FROM promo WHERE id_promo = '$promo'")->row_array();
			if($q['tipe_promo']=="Diskon"){
				$potongan_harga = $q['diskon'];
			}else if($q['tipe_promo']=="Potongan Harga"){
				$potongan_harga = $q['potongan_harga'];
			}
			$nama_promo = $q['nama_promo'];
			$tipe_promo = $q['tipe_promo'];
		}

		$sub_total = $this->input->post('qty_beli') * $this->input->post('harga');
		$data = array(
	        'id_detail_pemesanan' => $id_detail_pemesanan,
	        'id_pemesanan' => $id_pemesanan,
	        'id_produk' => $this->input->post('id_produk'),
	        'qty_beli' => $this->input->post('qty_beli'),
	        'sub_total' => $sub_total,
	        'created' => date("Y-m-d H:i:s"),
	        'updated' => date("Y-m-d H:i:s"),
	        'promo' => $nama_promo,
	        'potongan_harga' => $potongan_harga,
	        'tipe_promo'=>$tipe_promo
		);

		$simpan = $this->db->insert('detail_pemesanan', $data);

		$q = 	"SELECT 
					* 
				FROM 
					`produk_update` 
				WHERE 
					`id_produk` = '". $data['id_produk'] ."' 
						AND 
					`tgl_produk` = '". date('Y-m-d') ."'
						AND
					`sisa_stok` >= '". $data['qty_beli'] ."';
				";
		$r = $this->db->query($q, false)->result_array();
		$n = count($r);
		$id_produk_update = 0;
		if ($n > 0) {
			$id_produk_update = $r[0]['id_produk_update'];
			$id 	= $r[0]['id_produk_update'];
			$qty 	= $r[0]['sisa_stok'] - $data['qty_beli'];

			$q = "UPDATE `produk_update` SET `sisa_stok` = '". $qty ."' WHERE `id_produk_update` = '". $id ."';";
			$this->db->query($q, false);
		}

		$q = "SELECT * FROM `detail_produk` WHERE `id_produk` = '". $data['id_produk'] ."';";
		$r = $this->db->query($q, false)->result_array();
		$n = count($r);
		if ($n > 0) {
			$this->load->library('lib_func');
			for ($i=0; $i < $n; $i++) { 
				$id_bbk = $this->lib_func->createIdReference('BBK','bahan_baku_keluar','id_bahan_baku_keluar');
				$q = 	"INSERT INTO 
							`bahan_baku_keluar` 
							(
								`id_bahan_baku_keluar`,
								`id_detail_pemesanan`,
								`id_produk_update`,
								`id_bahan_baku`,
								`id_produk`,
								`qty`,
								`created`,
								`updated`
							) 
						VALUES 
							(
								'". $id_bbk ."',
								'". $id_detail_pemesanan ."',
								'". $id_produk_update ."',
								'". $r[$i]['id_bahan_baku'] ."',
								'". $data['id_produk'] ."',
								'". $r[$i]['qty'] * $data['qty_beli'] ."',
								'". date('Y-m-d') ."',
								'". date('Y-m-d') ."'
							);
						";
				$this->db->query($q, false);
			}
		}

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

		$q = "SELECT * FROM `detail_pemesanan` WHERE `id_detail_pemesanan` = '". $id_detail_pemesanan ."';";
		$r = $this->db->query($q, false)->result_array();
		$n = count($r);
		if ($n > 0) {
			$id_produk 	= $r[0]['id_produk'];
			$qty 		= $r[0]['qty_beli'];
			$date 		= date('Y-m-d');

			$q = 	"SELECT 
						* 
					FROM 
						`produk_update` 
					WHERE 
						`id_produk` = '". $id_produk ."' 
							AND 
						`sisa_stok` >= 0
							AND 
						`tgl_produk` = '". $date ."';
					";
			$r = $this->db->query($q, false)->result_array();
			$n = count($r);
			if ($n > 0) {
				$qty = $r[0]['sisa_stok'] + $qty;

				$q = 	"UPDATE 
							`produk_update` 
						SET 
							`sisa_stok` = '". $qty ."' 
						WHERE 
							`id_produk` = '". $id_produk ."' 
								AND 
							`tgl_produk` = '". $date ."';
						";
				$this->db->query($q, false);
			}

			$q = 	"DELETE FROM 
						`bahan_baku_keluar`
					WHERE 
						`id_detail_pemesanan` = '". $id_detail_pemesanan ."' 
							AND 
						`id_produk` = '". $id_produk ."';
					";
			$this->db->query($q, false);
		}

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

	function cekProduk($data = array())
	{
		$result = array('result' => true);

		$q = 	"SELECT 
					* 
				FROM 
					`produk_update` 
				WHERE 
					`id_produk` = '". $data['id_produk'] ."' 
						AND 
					`tgl_produk` = '". date('Y-m-d') ."' 
						AND 
					`sisa_stok` >= '". $data['qty'] ."';
				";
		$r = $this->db->query($q, false)->result_array();
		$n = count($r);
		if ($n > 0) {
			
		} else{
			$result['result'] = false;
		}

		return $result;
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Model_produk extends CI_Model {

	function getData(){
		$this->db->select("*");
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->order_by('produk.created DESC');
		return $this->db->get()->result();
	}

	function getDataExport()
	{
		$q = "SELECT a.*, b.`kategori` FROM `produk` a JOIN `kategori` b ON b.`id_kategori` = a.`id_kategori` ORDER BY a.`created` DESC;";
		$r = $this->db->query($q, false)->result_array();

		return $r;
	}

	function getDetailProduk($id_produk){
		$this->db->select("*");
		$this->db->from('detail_produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_detail DESC');
		return $this->db->get()->result();
	}

	function getKategori(){
		$this->db->select("*");
		$this->db->from('kategori');
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function getBahanBaku(){
		$this->db->select("*");
		$this->db->from('bahan_baku');
		$this->db->order_by('created DESC');
		return $this->db->get()->result();
	}

	function getBahanBaku2($id_bahan_baku){
		$this->db->select("*");
		$this->db->from('bahan_baku');
		$this->db->where('id_bahan_baku', $id_bahan_baku);
		return $this->db->get()->row_array();
	}

	function insertData(){
		$alert = "";
		$result = "";
		$gambar = "default.jpg";
		//`id_produk`, `nama_produk`, `gambar`, `id_kategri`, `harga`, `deskripsi`, `status`, `created`, `updated`

		if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 			= 'uploads/images';
		    $config['file_name']			= date('YmdHis');
		    $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 20000;
            $config['max_width']            = 5120;
            $config['max_height']           = 5120;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar'))
            {
                $alert = $this->upload->display_errors();
                $result = "danger";
            }
            else
            {
                $upload = $this->upload->data();
                $gambar = $upload['file_name'];
            }

		}
		$data = array(
			'tgl_produk' 	=> $this->input->post('tgl_produk'),
	        'id_produk' 	=> $this->input->post('id_produk'),
	        'nama_produk' 	=> $this->input->post('nama_produk'),
	        'gambar' 		=> $gambar,
	        'id_kategori' 	=> $this->input->post('id_kategori'),
	        'harga' 		=> $this->input->post('harga'),
	        //'deskripsi' 	=> $this->input->post('deskripsi'),
	        'status' 		=> $this->input->post('status'),
	        'created' 		=> date("Y-m-d H:i:s"),
	        'updated' 		=> date("Y-m-d H:i:s"),
	        'stok_baru' 	=> $this->input->post('stok_baru'),
	        'sisa_stok' 	=> $this->input->post('sisa_stok')
		);

		$simpan = $this->db->insert('produk', $data);

		$q = 	"INSERT INTO 
					`produk_update` 
					(
						`tgl_produk`,
						`id_produk`,
						`nama_produk`,
						`harga`,
						`stok_baru`,
						`sisa_stok`,
						`created`,
						`updated`
					) 
				VALUES 
					(
						'". $data['tgl_produk'] ."',
						'". $data['id_produk'] ."',
						'". $data['nama_produk'] ."',
						'". $data['harga'] ."',
						'". $data['stok_baru'] ."',
						'". $data['sisa_stok'] ."',
						'". $data['created'] ."',
						'". $data['updated'] ."'
					);
				";
		$this->db->query($q, false);

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

	function insertBahanBaku($id_bahan_baku, $qty){
		$alert = "";
		$result = "";
		$this->load->library('lib_func');
		$id_detail = $this->lib_func->createIdReference('DP','detail_produk','id_detail');
		//`id_detail`, `id_bahan_baku`, `id_produk`, `qty`, `satuan`
		$bahan_baku = $this->getBahanBaku2($id_bahan_baku);
		$data = array(
	        'id_detail' => $id_detail,
	        'id_bahan_baku' => $bahan_baku['id_bahan_baku'],
	        'bahan_baku' => $bahan_baku['bahan_baku'],
	        'id_produk' => $this->input->post('id_produk'),
	        'qty' => $qty,
	        'satuan' => $bahan_baku['satuan'],
		);

		$simpan = $this->db->insert('detail_produk', $data);

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
		$gambar = $this->input->post('gambar_old');
		$id_produk = $this->input->post('id_produk');
		//`id_produk`, `nama_produk`, `gambar`, `id_kategri`, `harga`, `deskripsi`, `status`, `created`, `updated`

		if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 			= 'uploads/images';
		    $config['file_name']			= date('YmdHis');
		    $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 20000;
            $config['max_width']            = 5120;
            $config['max_height']           = 5120;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar'))
            {
                $alert = $this->upload->display_errors();
                $result = "danger";
            }
            else
            {
                $upload = $this->upload->data();
                $gambar = $upload['file_name'];
            }

		}
		$data = array(
	        'id_produk' => $this->input->post('id_produk'),
	        'nama_produk' => $this->input->post('nama_produk'),
	        'gambar' => $gambar,
	        'id_kategori' => $this->input->post('id_kategori'),
	        'harga' => $this->input->post('harga'),
	        'deskripsi' => $this->input->post('deskripsi'),
	        'status' => $this->input->post('status'),
	        'updated' => date("Y-m-d H:i:s"),
		);

		$this->db->where('id_produk', $id_produk);
		$simpan = $this->db->update('produk', $data);

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
		$kdproduk = $this->uri->segment(3);
		$this->db->select("*");
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->order_by('produk.created DESC');
		$this->db->where('id_produk', $kdproduk);
		$query = $this->db->get();

		return $query->row_array();
	}

	function editDproduk(){
		$kdproduk = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM `detail_produk` WHERE id_produk = '".$kdproduk."'");

		return $query->result_array();
	}

	function deleteData(){
		$alert = "";
		$result = "";

		$this->db->where("id_produk", $this->uri->segment(3));
		$exe = $this->db->delete('produk');

		$this->db->where("id_produk", $this->uri->segment(3));
		$exe2 = $this->db->delete('detail_produk');
		if($exe && $exe2){
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

	function deleteDetail($id_detail){
		$alert = "";
		$result = "";

		$this->db->where("id_detail", $id_detail);
		$exe = $this->db->delete('detail_produk');
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

}
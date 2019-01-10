<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_func
{
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	function createIdReference($Ref, $table, $idPK)
	{
		//max counter = 4
		// 1llyyyymmdd9999
		$hasil = $Ref.date('Y').date('m').date('d');

		$this->CI->db->select_max($idPK);
		$this->CI->db->from($table);
		$this->CI->db->like($idPK,$hasil);
		$temp= $this->CI->db->get();
		// $this->CI->db->close(); //seharusnya disable jika mengunakan transaction
		$temp = $temp->result_array();


		if(empty($temp[0][$idPK]))
		{
			$hasil = $hasil."0001";
		}

		else
		{
			$str = $temp[0][$idPK];
			$str = substr($str,11,4);
			$str=$str+1;

			$panjangString = 4;
			$jumlahNol = $panjangString - strlen($str);

			for($i =0;$i<$jumlahNol;$i++)
			{
				$hasil = $hasil."0";
			}
			$hasil = $hasil.$str;
		}

		return $hasil;
	}
}
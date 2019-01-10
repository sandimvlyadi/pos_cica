<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Bahan_baku_keluar_baru_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get bahan_baku_keluar by id_bahan_baku_keluar
     */
    function get_bahan_baku_keluar($id_bahan_baku_keluar)
    {
        return $this->db->get_where('bahan_baku_keluar',array('id_bahan_baku_keluar'=>$id_bahan_baku_keluar))->row_array();
    }
        
    /*
     * Get all bahan_baku_keluar
     */
    function get_all_bahan_baku_keluar()
    {
        $this->db->order_by('id_bahan_baku_keluar', 'desc');
        return $this->db->get('bahan_baku_keluar')->result_array();
    }
        
    /*
     * function to add new bahan_baku_keluar
     */
    function add_bahan_baku_keluar($params)
    {
        $this->db->insert('bahan_baku_keluar',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update bahan_baku_keluar
     */
    function update_bahan_baku_keluar($id_bahan_baku_keluar,$params)
    {
        $this->db->where('id_bahan_baku_keluar',$id_bahan_baku_keluar);
        return $this->db->update('bahan_baku_keluar',$params);
    }
    
    /*
     * function to delete bahan_baku_keluar
     */
    function delete_bahan_baku_keluar($id_bahan_baku_keluar)
    {
        return $this->db->delete('bahan_baku_keluar',array('id_bahan_baku_keluar'=>$id_bahan_baku_keluar));
    }

    function getExportBulan()
    {
        $q =    "SELECT 
                    a.`id_bahan_baku_keluar`,
                    b.`bahan_baku`,
                    a.`qty`,
                    a.`created` 
                FROM 
                    `bahan_baku_keluar` a
                JOIN
                    `bahan_baku` b
                        ON
                    a.`id_bahan_baku` = b.`id_bahan_baku`
                WHERE 
                    MONTH(a.`created`) = MONTH('". date('Y-m-d') ."');
                ";
        $r = $this->db->query($q, false)->result_array();

        return $r;
    }

    function getExportTahun()
    {
        $q =    "SELECT 
                    a.`id_bahan_baku_keluar`,
                    b.`bahan_baku`,
                    a.`qty`,
                    a.`created` 
                FROM 
                    `bahan_baku_keluar` a
                JOIN
                    `bahan_baku` b
                        ON
                    a.`id_bahan_baku` = b.`id_bahan_baku`
                WHERE 
                    YEAR(a.`created`) = YEAR('". date('Y-m-d') ."');
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
                    a.`id_bahan_baku_keluar`,
                    b.`bahan_baku`,
                    a.`qty`,
                    a.`created` 
                FROM 
                    `bahan_baku_keluar` a
                JOIN
                    `bahan_baku` b
                        ON
                    a.`id_bahan_baku` = b.`id_bahan_baku`
                WHERE 
                    MONTH(a.`created`) IN (". $range .");
                ";
        $r = $this->db->query($q, false)->result_array();

        return $r;
    }
}

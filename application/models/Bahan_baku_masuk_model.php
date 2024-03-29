<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Bahan_baku_masuk_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get bahan_baku_masuk by id_bahan_baku_masuk
     */
    function get_bahan_baku_masuk($id_bahan_baku_masuk)
    {
        return $this->db->get_where('bahan_baku_masuk',array('id_bahan_baku_masuk'=>$id_bahan_baku_masuk))->row_array();
    }

    function get_bahan_baku2($id_bahan_baku)
    {
        return $this->db->get_where('bahan_baku',array('id_bahan_baku'=>$id_bahan_baku))->row_array();
    }
        
    /*
     * Get all bahan_baku_masuk
     */
    function get_all_bahan_baku_masuk()
    {
        $this->db->select('*');
        $this->db->from('bahan_baku_masuk');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahan_baku = bahan_baku_masuk.id_bahan_baku');
        $this->db->order_by('id_bahan_baku_masuk', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_bahan_baku()
    {
        $this->db->order_by('id_bahan_baku', 'desc');
        return $this->db->get('bahan_baku')->result_array();
    }
        
    /*
     * function to add new bahan_baku_masuk
     */
    function add_bahan_baku_masuk($params)
    {
        $this->db->insert('bahan_baku_masuk',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update bahan_baku_masuk
     */
    function update_bahan_baku_masuk($id_bahan_baku_masuk,$params)
    {
        $this->db->where('id_bahan_baku_masuk',$id_bahan_baku_masuk);
        return $this->db->update('bahan_baku_masuk',$params);
    }

    function update_bahan_baku($id_bahan_baku,$params)
    {
        $this->db->where('id_bahan_baku',$id_bahan_baku);
        return $this->db->update('bahan_baku',$params);
    }
    
    /*
     * function to delete bahan_baku_masuk
     */
    function delete_bahan_baku_masuk($id_bahan_baku_masuk)
    {
        return $this->db->delete('bahan_baku_masuk',array('id_bahan_baku_masuk'=>$id_bahan_baku_masuk));
    }
}

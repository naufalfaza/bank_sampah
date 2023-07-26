<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_utama extends CI_Model
{

	// ------------------------------------------------------------------------------- //

    // AWAL FUNCTION UNTUK CRUD DATA

    // PERINTAH INPUT
    function input_data($data,$table)
    {
        return $this->db->insert($table,$data);
    }
     
    // PERINTAH HAPUS 
    function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // PERINTAH UPDATE
    function update_data($table,$data,$where)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    // AKHIR FUNCTION UNTUK CRUD DATA

    // ----------------------------------------------------------------------------- //

    // GEMERATE KODE KODE SAMPAH
    function id_sampah($object)
    {
        $this->db->select("(SELECT MAX(id_sampah) FROM tbl_jenis_sampah WHERE id_sampah LIKE '$object%') AS id" , FALSE);
        $query = $this->db->get();
        $row = $query->row();
        $id = (int) substr($row->id,11,4); $id++;
        return $new = $object.sprintf("%04s", $id);
    }

    // GEMERATE KODE KODE TRANSAKSI
    function id_transaksi($object)
    {
        $this->db->select("(SELECT MAX(id_transaksi) FROM tbl_transaksi WHERE id_transaksi LIKE '$object%') AS id" , FALSE);
        $query = $this->db->get();
        $row = $query->row();
        $id = (int) substr($row->id,11,4); $id++;
        return $new = $object.sprintf("%04s", $id);
    }

}
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	// ------------------------------------------------------------------------------- //

    // AWAL FUNCTION UNTUK GET DATA

    // DATA JENIS SAMPAH
    function data_jenis_sampah($id_sampah)
    {
        $this->db->select('*');
        $this->db->from("tbl_jenis_sampah");
        if ($id_sampah != "") {
            $this->db->where("id_sampah='$id_sampah'");
        }
        return $this->db->get();
    }

    // DATA PENGGUNA
    function data_pengguna($id_user)
    {
        $this->db->select('*');
        $this->db->from("tbl_user");
        $this->db->join("tbl_detail_user","tbl_detail_user.id_user=tbl_user.id_user", "left");
        if ($id_user != "") {
            $this->db->where("id_user='$id_user'");
        }
        return $this->db->get();
    }

    // DATA PENGGUNA
    function data_siswa($id_user)
    {
        $this->db->select('*');
        $this->db->from("tbl_user");
        $this->db->join("tbl_detail_user","tbl_detail_user.id_user=tbl_user.id_user", "left");
        if ($id_user != "") {
            $this->db->where("tbl_user.id_user='$id_user'");
        }else{
            $this->db->where("status='Y' AND role='2'");
        }
        return $this->db->get();
    }

    // AKHIR FUNCTION UNTUK GET DATA

    // ----------------------------------------------------------------------------- //

}
?>
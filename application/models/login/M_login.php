<?php

class M_login extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // CRUD
    function inputData($table, $data){
        $this->db->insert($table, $data);
    }
     
    function hapusData($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function updateData($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	function getWhere($table, $where) {		
		return $this->db->get_where($table, $where);
	}

	// Generate Id User
	function idUser($object) {
        $this->db->select("(SELECT MAX(id_user) FROM tbl_user WHERE id_user LIKE '$object%') AS id" , FALSE);
        $query = $this->db->get();
        $row = $query->row();
        $id = (int) substr($row->id, 8, 3); $id++;
        return $new = $object.sprintf("%03s", $id);
    }

    function idUserDetail($object) {
        $this->db->select("(SELECT MAX(id_detail) FROM tbl_detail_user WHERE id_detail LIKE '$object%') AS id" , FALSE);
        $query = $this->db->get();
        $row = $query->row();
        $id = (int) substr($row->id, 8, 3); $id++;
        return $new = $object.sprintf("%03s", $id);
    }

}
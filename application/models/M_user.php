<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model {

    function getTransaksi($table, $data) {
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get_where($table, $data);
        return $query;
    }

    function getWhere($table, $data) {
        $query = $this->db->get_where($table, $data);
        return $query;
    }

}
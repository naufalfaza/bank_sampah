<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        $this->load->model(array('M_admin','M_utama'));
        $this->load->library('session');
		if ($this->session->userdata('role') != "1") {
			redirect(base_url());
		}
    }

	public function index() {
		$this->load->view('admin/structure/header');
		$this->load->view('admin/structure/navbar');
		$this->load->view('admin/structure/sidebar');
		$this->load->view('admin/structure/body');
		$this->load->view('admin/structure/footer');
	}

	public function jenis_sampah() 
	{
		$this->load->view('admin/structure/header');
		$this->load->view('admin/structure/navbar');
		$this->load->view('admin/structure/sidebar');
		$this->load->view('admin/pages/data_jenis_sampah');
		$this->load->view('admin/structure/footer');
	}

	public function data_pengguna() 
	{
		$this->load->view('admin/structure/header');
		$this->load->view('admin/structure/navbar');
		$this->load->view('admin/structure/sidebar');
		$this->load->view('admin/pages/data_pengguna');
		$this->load->view('admin/structure/footer');
	}
	
	public function data_siswa() 
	{
		$this->load->view('admin/structure/header');
		$this->load->view('admin/structure/navbar');
		$this->load->view('admin/structure/sidebar');
		$this->load->view('admin/pages/data_siswa');
		$this->load->view('admin/structure/footer');
	}

	public function data_penukaran_sampah() 
	{
		$this->load->view('admin/structure/header');
		$this->load->view('admin/structure/navbar');
		$this->load->view('admin/structure/sidebar');
		$this->load->view('admin/pages/data_penukaran_sampah');
		$this->load->view('admin/structure/footer');
	}

	public function konfig_jenis_sampah()
	{
		$id_sampah = $this->input->post('id_sampah');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$harga =	str_replace(".", "", $harga);

		if ($this->input->get('aksi') == "simpan") {
			$data = array(
				'id_sampah' => $this->M_utama->id_sampah('JNS_SAMPAH-'),
				'kategori' => $kategori,
				'harga' => $harga,
				'tgl_record' => date("Y-m-d"),
				'jam_record' => date("H:i:s")
			);	
			$table = "tbl_jenis_sampah";
			$this->M_utama->input_data($data,$table);
		}elseif ($this->input->get('aksi') == "detail") {
			$data = $this->M_admin->data_jenis_sampah($id_sampah)->row();
			$data = array('kategori' => $data->kategori,'harga' => rupiah($data->harga));
		}else{
			$table = "tbl_jenis_sampah";
			$data = array('kategori' => $kategori, 'harga' => $harga);
			$where = array('id_sampah' => $id_sampah);
			$this->M_utama->update_data($table,$data,$where);
		}

		echo json_encode($data);
	}

	public function konfig_penukaran_sampah()
	{

		if ($this->input->get('aksi') == "siswa") {
			$id_user = $this->input->post('id_user');
			$data = $this->M_admin->data_siswa($id_user)->row();
			$data = array('nama' => $data->nama);
		}elseif ($this->input->get('aksi') == "harga_jenis_sampah") {
			$id_sampah = $this->input->post('id_sampah');
			$data = $this->M_admin->data_jenis_sampah($id_sampah)->row();
			$data = array('harga' => rupiah($data->harga));
		}elseif ($this->input->get('aksi') == "hitung_satuan") {
			$qty = $this->input->post('qty');
			$harga = $this->input->post('harga');
			$harga =	str_replace(".", "", $harga);
			$jumlah = $qty*$harga;
			$data = array('jumlah' => rupiah($jumlah) );
		}elseif ($this->input->get('aksi') == "hitung_total") {
			$count = $this->input->post('count');
			$data = array('total' => rupiah($count));
		}

		echo json_encode($data);

	}
}

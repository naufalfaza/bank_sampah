<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('login/M_login');
        $this->load->library('session');
		date_default_timezone_set("Asia/Jakarta");
    }

	public function index() {
		if ($this->session->userdata('status')) {
			switch ($this->session->userdata('role')) {
				case '1':
					redirect('admin');
					break;
				case '2':
					redirect('user');
					break;
			}
		} else {
			$this->load->view('login/header');
			$this->load->view('login/login');
			$this->load->view('login/footer');
		}
	}

	function register() {
		if ($this->session->userdata('status')) {
			switch ($this->session->userdata('role')) {
				case '1':
					redirect('admin');
					break;
				case '2':
					redirect('user');
					break;
			}
		} else {
			$this->load->view('login/header');
			$this->load->view('login/register');
			$this->load->view('login/footer');
		}
	}

	function prosesLogin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Cek Data
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cekData = $this->M_login->getWhere("tbl_user", $where)->num_rows();
		$getData = $this->M_login->getWhere("tbl_user", $where)->row();
		if ($cekData > 0) {
			if ($getData->status == 'P') {
				$response = "error";
				$role = "";
				$ket = "Akun Sedang Ditinjau !";
			} else {
				// Create Session
				$data_session = array(
					'id_user' => $getData->id_user, 
					'name' => $getData->username,
					'role' => $getData->role,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				// Hak Akses
				if ($this->session->userdata('role') == 1) {
					$response = "success";
					$role = "1";
					$ket = "Login Berhasil !";
				} else {
					$response = "success";
					$role = "2";
					$ket = "Login Berhasil !";
				}
			}
		} else {
			$response = "error";
			$role = "";
			$ket = "Akun Tidak Tersedia !";
		}
		echo json_encode(array('response' => $response, "role" => $role, "keterangan" => $ket));
	}

	function prosesRegis() {
		$noHp = $this->input->post('noHp');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// Cek Data
		$where = array(
			'username' => $username
		);
		$cekData = $this->M_login->getWhere("tbl_user", $where)->num_rows();
		if ($cekData > 0) {
			$response = "error";
			$ket = "Username Telah Digunakan !"; 
		} else {
			$response = "success";
			$ket = "Pendaftaran Berhasil !";
			$data = array(
				'id_user' => $this->M_login->id_user('USR-'),
				'username' => $username,
				'password' => $password,
				'role' => 2,
				'status' => 'P',
				'tgl_record' => date('Y-m-d'),
				'jam_record' => date('H:i:s')
			);
			$this->M_login->inputData('tbl_user', $data);
		}
		echo json_encode(array('response' => $response, "keterangan" => $ket));
	}

	function prosesLogout() {
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->library('session');
		date_default_timezone_set("Asia/Jakarta");
		if ($this->session->userdata('role') != "2") {
			redirect(base_url());
		}
    }

	public function index() {
		$this->load->view('user/structure/header');
		$this->load->view('user/structure/navbar');
		$this->load->view('user/structure/sidebar');
		$this->load->view('user/structure/body');
		$this->load->view('user/structure/footer');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index() {

		$data['fabrics'] = $this->home_model->get_fabrics()->result();
		$this->load->view('headers/header.php');
		$this->load->view('home/main.php' , $data);
		$this->load->view('headers/footer.php');
	}

	
}
?>

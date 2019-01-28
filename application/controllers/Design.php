<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

  public function index(){

		if($_POST){

			$_SESSION['id'] = $_POST['id'];
			$_SESSION['fabric_photo'] = $_POST['photo'];
			$_SESSION['fabric_name'] = $_POST['name'];
			$_SESSION['fabric_price'] = $_POST['price'];

		}

		$data['designers'] = $this->home_model->get_designers()->result();
		$this->load->view('headers/header.php');
		$this->load->view('home/choice_design.php' , $data);
		$this->load->view('headers/footer.php');

  }

	public function upload_photo(){
		$this->load->view('headers/header.php');
		$this->load->view('home/upload_photo.php' );
		$this->load->view('headers/footer.php');
	}

	public function drow(){
		$this->load->view('headers/header.php');
		$this->load->view('home/draw.php' );
		$this->load->view('headers/footer.php');
	}

	public function designers(){
		$data['designers'] = $this->home_model->get_designers()->result();
		$this->load->view('headers/header.php');
		$this->load->view('home/designers.php' , $data);
		$this->load->view('headers/footer.php');
	}

}
?>

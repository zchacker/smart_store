<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tailor extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

  public function index(){
		//var_dump($_POST);

		if($_POST) {

			if(@$_POST['design_img']){

				$img = $_POST['design_img'];
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$fileData = base64_decode($img);
				//saving
				$fileName = './temp/'.uniqid('design_').'.png';
				file_put_contents($fileName, $fileData);
				$_SESSION['design_photo'] = $fileName;
				$_SESSION['is_photo'] = 1;

			} else if(@$_POST['design']) {

				$_SESSION['design_id'] = $_POST['id'];
				$_SESSION['design_name'] = $_POST['name'];
				$_SESSION['design_price'] = $_POST['price'];

				$_SESSION['is_photo'] = 0;

			}

		}

		if(!empty($_FILES)){

			$config['upload_path']  = './temp/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = uniqid('design_');
			$config['overwrite'] = TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')) {
				header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
			} else {
				$_SESSION['is_photo'] = 1;
				$_SESSION['design_photo'] = base_url().'temp/'.$this->upload->data()['file_name'];
			}

		}

		//var_dump($_SESSION);

		$data['tailors'] = $this->home_model->getTailors()->result();
		$this->load->view('headers/header.php');
		$this->load->view('home/tailor.php' , $data );
		$this->load->view('headers/footer.php');

  }

}
?>

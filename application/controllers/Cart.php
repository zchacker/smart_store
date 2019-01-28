<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

  public function index(){
		if($_POST){
			$_SESSION['tailor_id'] = $_POST['id'];
			$_SESSION['tailor_name'] = $_POST['name'];
			$_SESSION['tailor_price'] = $_POST['price'];
		}
		//var_dump($_SESSION);
		$this->load->view('headers/header.php');
		$this->load->view('home/cart.php' );
		$this->load->view('headers/footer.php');
  }

	public function confirem(){
		if($_POST){

			$tailor = $_SESSION['tailor_name'].' '.$_SESSION['tailor_price'].' SAR';
			$fabrics = $_SESSION['fabric_name'].' '.$_SESSION['fabric_price'].' SAR';
			$design = '';
			$width = $_POST['width'];
			$height = $_POST['height'];

			if(isset($_SESSION['design_price'])){
				
				$total = $_SESSION['fabric_price'] + $_SESSION['tailor_price'] + $_SESSION['design_price'];
			}else{
				$total = $_SESSION['fabric_price'] + $_SESSION['tailor_price'];
			}

			if($_SESSION['is_photo'] == 0){
				$design = $_SESSION['design_name'].' '.$_SESSION['design_price'].' SAR';
			}else{
				$design = $_SESSION['design_photo'];
			}

			$invoice_no = uniqid('inv_' , FALSE);

			$data = array(
				'invoice_no' => $invoice_no,
				'tailor' => $tailor,
				'fabrics' => $fabrics,
				'design' => $design,
				'is_photo' => $_SESSION['is_photo'],
				'width' => $width,
				'height' => $height,
				'total' => $total
			);

			$this->home_model->add_order($data);

			$data['order_id'] = $invoice_no;
			$this->load->view('headers/header.php');
			$this->load->view('home/thanks.php' ,$data );
			$this->load->view('headers/footer.php');

		}
	}

}
?>

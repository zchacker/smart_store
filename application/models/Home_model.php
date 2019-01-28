<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model {

  public function get_fabrics(){
    return $this->db->get('fabrics');
  }

  public function getTailors(){
      return $this->db->get('tailor');
  }


  public function get_designers(){
      return $this->db->get('designers');
  }

  public function add_order($data){
    $this->db->insert('cart' , $data);
  }

}
?>

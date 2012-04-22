<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dev extends CI_Controller {

  public function index() {
    $data['view_location'] = "dev/mobile";
    $data['page_title'] = "IP Logger";
    $data['page_css'] = array();
    $data['page_js'] = array('jquery');
    
    $this->load->view('dev/mobile', $data);
  }
  
  public function iplogger() {
    $data['view_location'] = "dev/iplogger";
    $data['page_title'] = "IP Logger";
    $data['page_css'] = array();
    $data['page_js'] = array('jquery');
    
    $this->load->view($data['view_location'], $data);
  }
  
}

/* End of file home.php */
/* Location: ./application/controllers/iplogger.php */

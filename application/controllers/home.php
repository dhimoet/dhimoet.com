<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
    $data['view_location'] = "home/index";
    $data['page_title'] = "Home";
    $data['page_css'] = array('960', 'reset', 'text', 'main');
    $data['page_js'] = array('jquery', 'home');
    
		$this->load->view('base', $data);
	}
  
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index() {
    $data['view_location'] = "test/index";
    $data['page_title'] = "Test";
    $data['page_css'] = array('960', 'reset', 'text', 'test');
    $data['page_js'] = array('jquery', 'test');
    
		$this->load->view('base', $data);
	}
  
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
    $data['page_title'] = "Welcome";
    $data['page_css'] = array('960', 'reset', 'text', 'main');
    $data['page_js'] = array('jquery');
    
		$this->load->view('index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

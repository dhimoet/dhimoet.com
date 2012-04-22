<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audio extends CI_Controller {

	public function index() {
    $data['filename'] = $this->uri->segment(2);
    
    $data['view_location'] = "audio/index";
    $data['page_title'] = "Audio";
    $data['page_css'] = array('960', 'reset', 'text', 'main');
    $data['page_js'] = array('jquery', 'home');
    
		$this->load->view('base', $data);
	}
  
}

/* End of file audio.php */
/* Location: ./application/controllers/audio.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/base_header');
		$this->load->view('home/index');
		$this->load->view('templates/base_footer');
	}
	
	public function clients()
	{
		$this->load->view('templates/base_header');
		$this->load->view('home/clients');
		$this->load->view('templates/base_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */

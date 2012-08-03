<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
		$title = ucwords(str_replace('_', ' ',$this->router->fetch_method()));
		$this->head['doctype'] = doctype('html4-trans');
		$this->head['title'] = "Dhimoet.com | " . $title;
		$this->head['css'] = array("/static/css/main.css",
								   "/static/css/960.css",
								   "/static/css/reset.css",
								   "/static/css/text.css",
								   "/static/css/validationEngine.jquery.css");
		$this->head['js'] = array("/static/js/jquery-1.7.2.min.js",
								  "/static/js/jquery.validationEngine.js",
								  "/static/js/jquery.validationEngine-en.js",
								  "/static/js/underscore-min.js",
								  "/static/js/backbone-min.js",
								  "/static/js/home.js");
	}
	
	public function index() {
		$this->home();
	}

	public function home() {
    
		$this->load->view('templates/base_header', $this->head);
		$this->load->view('templates/backbone');
		$this->load->view('home/index');
		$this->load->view('templates/base_footer');
		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

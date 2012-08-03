<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index() {
    
	}
    
	public function send_email() {
		$this->load->library('email');
		
		$from = $this->input->post('from');
		$message = $this->input->post('message');
		$message = "This message was sent by: \n{$from}\n\n" . $message;

		$this->email->from("system@dhimoet.com", "System Message");
		$this->email->to('admin@dhimoet.com', 'Dhimoet Admin'); 
		$this->email->subject('A visitor has sent you a message!');
		$this->email->message($message);	

		$this->email->send();
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

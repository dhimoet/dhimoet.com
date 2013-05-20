<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cctv extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->recorder();
	}
	
	public function recorder()
	{
		$this->load->view('cctv/recorder');
	}
	
	public function ajax_images()
	{
		$to = $this->input->post('email');
		$images = json_decode($this->input->post('images'));
		$files = array();
		// write to files
		$files = $this->decode_images($images);
		// send files
		if($to)
			$this->send_email($to, $files);
		
		die(date('Y-m-d H:i:s', strtotime('now')));
	}
	
	private function decode_images($images)
	{
		$this->load->helper('file');
		$files = array();
		
		foreach($images as $key => $image) {
			$data = base64_decode($image);
			$date = date('Y-m-d_H-i-s', strtotime('now'));
			$file = "./static/img/cctv/{$date}_{$key}.jpg";
			
			// write to a file
			if (!write_file($file, $data)) {
				$files[] = null;
			}
			else {
				$files[] = $file;
			}
		}
		return $files;
	}
	
	private function send_email($to, $attachments) {
		$this->load->library('email');

        $message = '<p>Timestamp: '. date('Y-m-d H:i:s', strtotime('now')) .'</p>';
        $message.= '<p>Sever Address: '. $_SERVER['SERVER_ADDR'] .'</p>';
        $message.= '<p>Remote Address: '. $_SERVER['REMOTE_ADDR'] .'</p>';

		$this->email->from("system@dhimoet.com", "System Message");
		$this->email->to($to); 
		$this->email->subject('AUTOMATED CCTV - Security Webcam');
		$this->email->message($message);
		// attach files
		foreach($attachments as $attachment) {
			$this->email->attach($attachment);
		}	
		// send the email
		if($this->email->send()) {
			return true;
		}
		else {
			return false;
		}
	}
}

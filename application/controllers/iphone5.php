<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iphone5 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		facebookInit();
		
		// Create our Application instance (replace this with your appId and secret).
		$facebook = new Facebook(array(
			'appId'  => '176237649167406',
			'secret' => '1a7a685d89a53d32af81bac630e8f638',
		));

		// Get User ID
		$user = $facebook->getUser();

		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.

		if ($user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
			} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			}
		}

		// Login or logout url will be needed depending on current user state.
		if ($user) {
			$this->logoutUrl = $facebook->getLogoutUrl();
		} else {
			$params = array(
				'scope' => 'email,publish_actions,publish_stream'
			);
			$this->loginUrl = $facebook->getLoginUrl($params);
		}
		
		$this->facebook = $facebook;
	}

	public function index() 
	{
		if(!$this->facebook->getUser()) {
			redirect('/iphone5/login', 'refresh');
		}
		$this->load->view('iphone5/index');
	}
	
	public function login()
	{	
		echo $this->facebook->getUser();
		if(!$this->facebook->getUser()) {
			redirect($this->loginUrl, 'refresh');
		}
		else {
			redirect('/iphone5/', 'refresh');
		}
	}
	
	public function send()
	{
		if(!$this->facebook->getUser()) {
			redirect('/iphone5/login', 'refresh');
		}
		
		// publish to his wall
		$uid = $this->facebook->getUser();
		$message = $this->input->post('status');
		$url = "https://graph.facebook.com/{$uid}/feed";
		$params = array(
			'message' => $message,
		);
		$this->facebook->make_api_request($url, $params);
		
		redirect('iphone5', 'refresh');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/iphone5.php */

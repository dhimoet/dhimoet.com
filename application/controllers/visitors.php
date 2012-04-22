<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitors extends CI_Controller {

  public function index() {
    $data['view_location'] = "visitors/index";
    $data['page_title'] = "Visitors Page";
    $data['page_css'] = array('960', 'reset', 'text', 'main');
    $data['page_css_external'] = array('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    $data['page_js'] = array('jquery', 'home');
    $data['page_js_external'] = array('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js');
    
    $this->load->view('base', $data);
  }
  
}

/* End of file home.php */
/* Location: ./application/controllers/visitors.php */

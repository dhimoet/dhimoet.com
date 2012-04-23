<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utang extends CI_Controller {

    public function index() {
        $data['page_view'] = "utang/home";
        $data['page_title'] = 'Utang Mengutang';

        if (!$this->ion_auth->logged_in())
		{
			redirect('/utang/login');
		}
        else {
            redirect('/utang/home');
        }
    }
  
    public function login() {
        $data['page_view'] = "utang/login";
        $data['page_title'] = 'Utang Mengutang';

		if (!$this->ion_auth->logged_in())
		{
            $this->load->view('utang/base', $data);
		}
        else {
            redirect('/utang/home');
        }
    }
  
    public function home() {
        $data['page_view'] = "utang/home";
        $data['page_title'] = 'Home';

        $this->sessiondata = $this->session->all_userdata();
    
        if (!$this->ion_auth->logged_in())
		{
			redirect('/utang/login');
		}
        else {
            // get friends list
            $query = $this->db->get_where('utang_user', array('user_email' => $this->sessiondata['email']));
            $current_user = $query->row();
            $this->is_new = FALSE;
            if($current_user->user_friends == NULL) {
                $this->is_new = TRUE;
            }
            $friends_object = json_decode($current_user->user_friends); // to object
            $this->friend = array();
            foreach($friends_object as $email => $status) {
                // get the user name for each email address
                $query = $this->db->get_where('users', array('email' => $email));
                $user = $query->row();
                $this->friend[$email]['username'] = $user->username;
                $this->friend[$email]['email'] = $email;
                $this->friend[$email]['status'] = $status;
                //--- get the total amount of transactions and the last transaction date
                // get the positive value
                $this->db->select_sum('trans_amount', 'positive');
                $this->db->where('trans_sender', $this->sessiondata['email']);
                $this->db->where('trans_recipient', $email);
                $this->db->where('trans_action', 2);
                $query = $this->db->get('utang_transaction');
                $row = $query->row();
                $amount = $row->positive;
                $this->db->select_sum('trans_amount', 'positive');
                $this->db->where('trans_sender', $email);
                $this->db->where('trans_recipient', $this->sessiondata['email']);
                $this->db->where('trans_action', 1);
                $query = $this->db->get('utang_transaction');
                $row = $query->row();
                $amount += $row->positive;
                // get the negative value
                $this->db->select_sum('trans_amount', 'negative');
                $this->db->where('trans_sender', $this->sessiondata['email']);
                $this->db->where('trans_recipient', $email);
                $this->db->where('trans_action', 1);
                $query = $this->db->get('utang_transaction');
                $row = $query->row();
                $amount -= $row->negative;
                $this->db->select_sum('trans_amount', 'negative');
                $this->db->where('trans_sender', $email);
                $this->db->where('trans_recipient', $this->sessiondata['email']);
                $this->db->where('trans_action', 2);
                $query = $this->db->get('utang_transaction');
                $row = $query->row();
                $amount -= $row->negative;
                $this->friend[$email]['amount'] = $amount;
                // get the last transaction date
                $where = array('trans_sender' => $this->sessiondata['email'], 'trans_recipient' => $email);
                $or_where = array('trans_sender' => $email, 'trans_recipient' => $this->sessiondata['email']);
                $this->db->where($where);
                $this->db->or_where($or_where);
                $this->db->order_by("trans_timestamp", "desc"); 
                $query = $this->db->get('utang_transaction', 1);
                $row = $query->row();
                $this->friend[$email]['last_date'] = $row->trans_timestamp;
                // increment the counter
            }
            $this->load->view('utang/base', $data);
        }   
    }
  
    public function summary() {
        $data['page_view'] = "utang/summary";
        $data['page_title'] = 'Summary';

        $this->sessiondata = $this->session->all_userdata();
    
        if (!$this->ion_auth->logged_in())
		{
			redirect('/utang/login');
		}
        else {
            $rel = explode(':', $this->input->get('data'));
            // run a query to get the username from the selected user
            $query = $this->db->get_where('users', array('email' => $rel[0]));
            $row = $query->row();
            $this->friend['email'] = $rel[0];
            $this->friend['amount'] = $rel[1];
            $this->friend['name'] = $row->username;
            // run a query to get all the transactions with the selected user
            $this->db->where(array('trans_sender' => $this->sessiondata['email']));
            $this->db->where(array('trans_recipient' => $rel[0]));
            $this->db->or_where(array('trans_recipient' => $this->sessiondata['email']));
            $this->db->where(array('trans_sender' => $rel[0]));
            $this->db->order_by('trans_timestamp DESC');
            $query = $this->db->get('utang_transaction');
            $this->transactions = $query->result();
     
            $this->load->view('utang/base', $data);
        }
    }
  
    public function details() {
        $data['page_view'] = "utang/details";
        $data['page_title'] = 'Details';

        $this->sessiondata = $this->session->all_userdata();

        if (!$this->ion_auth->logged_in())
		{
			redirect('/utang/login');
		}
        else {
            // run a query to get the transaction object
            $query = $this->db->get_where('utang_transaction', array('trans_id' => $this->input->get('trans_id')));
            $this->transaction = $query->row();
            $this->transaction->is_sender = 0;
            if($this->transaction->trans_sender != $this->sessiondata['email']) {
                $this->transaction->is_sender = 0;
                $condition_array = array('email' => $this->transaction->trans_sender);
            } 
            else {
                $this->transaction->is_sender = 1;
                $condition_array = array('email' => $this->transaction->trans_recipient);
            }
            // run a query to get the selected user name
            $query = $this->db->get_where('users', $condition_array);
            $row = $query->row();
            $this->transaction->username = $row->username;
            $this->load->view('utang/base', $data);
        }
    }
  
    public function add() {
        $data['page_view'] = "utang/add";
        $data['page_title'] = 'Add';
        
        $this->sessiondata = $this->session->all_userdata();
        $this->add = $this->input->post('add');
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('/utang/login');
	    }
        elseif (!$this->add['description']) {
            // get user's friends
            $query = $this->db->get_where('utang_user', array('user_email' => $this->sessiondata['email']));
            $row = $query->row();
            $this->friends = json_decode($row->user_friends);
            // get the usernames
            foreach($this->friends as $key => $value) {
                $query = $this->db->get_where('users', array('email' => $key) );
                $row = $query->row();
                $this->users->{$key} = $row->username; 
            }
            // display
            $this->load->view('utang/base', $data);
        }
        else {
            //validate form input
            $this->form_validation->set_rules('add[description]', 'Description', 'required');
            if ($this->form_validation->run() == true) {
                var_dump($this->add);
                // get all input data
                // insert input data into transaction table
                $utang_transaction = array(
                  'trans_sender' => $this->sessiondata['email'],
                  'trans_recipient' => $this->add['email'],
                  'trans_action' => $this->add['action'],
                  'trans_amount' => $this->add['amount'],
                  'trans_description' => $this->add['description'],
                  'trans_additional' => $this->add['additional']
                );
                $this->db->insert('utang_transaction', $utang_transaction);
                redirect('/utang/home');
            }
        }
    }
  
  public function activity() {
    $data['page_view'] = "utang/activity";
    $data['page_title'] = 'Activity';
    

    $this->sessiondata = $this->session->all_userdata();
    
    if (!$this->ion_auth->logged_in())
        {
            redirect('/utang/login');
        }
    else {
      // run a query to get friends list object  
      $query = $this->db->get_where('utang_user', array('user_email' => $this->sessiondata['email']));
      $row = $query->row();
      $friends_object = json_decode($row->user_friends);

      $this->friend = array();
      foreach($friends_object as $email => $status) {
          // run a query to get usernames object
          $query = $this->db->get_where('users', array('email' => $email));
          $row = $query->row();
          $this->friend[$email] = $row->username; 
      }

      // run a query to get all transactions
      // check and only display transactions that involve the user
      $this->db->where('trans_sender', $this->sessiondata['email']);
      $this->db->or_where('trans_recipient', $this->sessiondata['email']);
      $this->db->order_by('trans_timestamp DESC');
      $query = $this->db->get('utang_transaction');
      $this->transactions = $query->result();

      $this->load->view('utang/base', $data);
    }
  }
  
  public function settings() {
    $data['page_view'] = "utang/settings";
    $data['page_title'] = 'Settings';
    
    
    
    
    
    if (!$this->ion_auth->logged_in())
		{
			redirect('/utang/login');
		}
    else {
      $this->load->view('utang/base', $data);
    }
  }
  
  public function signup() {
    $data['page_view'] = "utang/signup";
    $data['page_title'] = 'Sign Up';
    
    
    
    
    
    if (!$this->ion_auth->logged_in())
		{
      $this->load->view('utang/base', $data);
		}
    else {
      redirect('/utang/home');
    }
  }
  
  public function addfriend() {
    $data['page_view'] = "utang/addfriend";
    $data['page_title'] = 'Add a Friend';
    
    
    
    
    $data['current_user'] = $this->session->all_userdata();
    
    if (!$this->ion_auth->logged_in())
    {
      redirect('/utang/login');
    }
    else {
      //validate form input
      $this->form_validation->set_rules('email', 'Email', 'required');
      if ($this->form_validation->run() == true) {
        // get all the input
        $email = trim($this->input->post('email'));
        $email = strtolower($email);
        $message = $this->input->post('additional');
        $is_requested = 0;
        // find the email in database
        $query = $this->db->get_where('utang_user', array('user_email' => $email));
        $row = $query->row();
        if($row && $email != $data['current_user']['email']) {
            //--- UPDATE DATABASE RECIPIENT
            // get the json friends list
            $friends_object = '';
            // add the input to the json
            if(($row->user_friends != NULL) || ($row->user_friends != '')) {
              $friends_object = json_decode($row->user_friends); // to object
            }
            if(isset($friends_object->{$data['current_user']['email']}) 
                                            && $friends_object->{$data['current_user']['email']} > 0) {
              $friends_object->{$data['current_user']['email']} = 2; // add to object
              $is_requested = 1;
            }
            else {
              $friends_object->{$data['current_user']['email']} = 0; // add to object
            }
            $friends_json = json_encode($friends_object); // to string
            // update database recipient
            $update = array('user_friends' => $friends_json);
            $this->db->where('user_email', $email);
            $this->db->update('utang_user', $update);
            
            //--- UPDATE DATABASE REQUESTER  
            // get the json friends list
            $query = $this->db->get_where('utang_user', array('user_email' => $data['current_user']['email']));
            $row = $query->row();
            $friends_object = '';
            // add the input to the json
            if(($row->user_friends != NULL) || ($row->user_friends != '')) {
              $friends_object = json_decode($row->user_friends); // to object
            }
            if($is_requested) {
              $friends_object->{$email} = 2; // add to object  
            }
            else {
              $friends_object->{$email} = 1; // add to object
            }
            $friends_json = json_encode($friends_object); // to string
            // update database requester
            $update = array('user_friends' => $friends_json);
            $this->db->where('user_email', $data['current_user']['email']);
            $this->db->update('utang_user', $update);
            
            // go back to home
            redirect('/utang/home');
        }
        else {
            $this->load->view('utang/base', $data);
        }
      }
      else {
        $this->load->view('utang/base', $data);
      }
    }
  } // end addfriend
  
  public function notifications() {
    $data['page_view'] = "utang/notifications";
    $data['page_title'] = 'Notifications';
    
    
    
    
    $data['current_user'] = $this->session->all_userdata();
    
    if (!$this->ion_auth->logged_in())
    {
      redirect('/utang/login');
    }
    else {
      //--- GET ALL NOTIFICATIONS AND DISPLAY ALL USING A LIST
      // get friend requests from database
      $query = $this->db->get_where('utang_user', array('user_email' => $data['current_user']['email']));
      $row = $query->row();
      if(($row->user_friends != NULL) || ($row->user_friends != '')) {
        $this->friends_object = json_decode($row->user_friends); // to object
        // go through the object

      }
      // display friend requests in a list
      $this->load->view('utang/base', $data);
    }
  } // end notifications
  
  /* Friend request statuses on user_friends json:
   * 0 - friend request pending for recipient
   * 1 - friend request pending for requester
   * 2 - friend request approved
   */
  public function confirmfriend() {
    $data['page_view'] = "utang/confirmfriend";
    $data['page_title'] = 'Confirm Friend';
    
    
    
    
    $data['current_user'] = $this->session->all_userdata();
    
    if (!$this->ion_auth->logged_in())
    {
      redirect('/utang/login');
    }
    else {
      if(!isset($_GET['confirmfriend'])) {
        $this->load->view('utang/base', $data);
      }
      else {
        // get the user's user_friends
        $query = $this->db->get_where('utang_user', array('user_email' => $data['current_user']['email']));
        $row = $query->row();
        $friends_object = '';
        $friends_object = json_decode($row->user_friends); // to object
        // find the email address from user_friends column and change the confirmation value to 2
        $friends_object->{$this->input->get('confirmfriend')} = 2; // add to object
        $friends_json = json_encode($friends_object); // to string
        // update to database
        $update = array('user_friends' => $friends_json);
        $this->db->where('user_email', $data['current_user']['email']);
        $this->db->update('utang_user', $update);
        //--- UPDATE DATABASE RECIPIENT
        // get the json friends list
        $query = $this->db->get_where('utang_user', array('user_email' => $this->input->get('confirmfriend')));
        $row = $query->row();
        $friends_object = '';
        // add the input to the json
        $friends_object = json_decode($row->user_friends); // to object
        // find the email address from user_friends column and change the confirmation value to 2
        $friends_object->{$data['current_user']['email']} = 2; // add to object
        $friends_json = json_encode($friends_object); // to string
        // update database recipient
        $update = array('user_friends' => $friends_json);
        $this->db->where('user_email', $this->input->get('confirmfriend'));
        $this->db->update('utang_user', $update);
        // redirect to notifications page
        redirect('/utang/notifications');
      }
    }
  } // end confirmfriend
  
    public function password() {
        $data['page_view'] = "utang/password";
        $data['page_title'] = 'Confirm Friend';
        
        $data['current_user'] = $this->session->all_userdata();
        
        if (!$this->ion_auth->logged_in())
        {
          redirect('/utang/login');
        }
        else {
            $this->load->view('utang/base', $data);
        }
    }
    
    public function bugs() {
        $data['page_view'] = "utang/bugs";
        $data['page_title'] = 'Report Bugs';
        
        
        $this->sessiondata = $this->session->all_userdata();
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('/utang/login/');
        }
        elseif ( $this->input->get('title') != '' ) {
            $report = array(
                'report_user' => $this->sessiondata['email'],
                'report_title' => $this->input->get('title'),
                'report_text' => $this->input->get('text')
            );
            $this->db->insert('utang_reports', $report);
            redirect('/utang/home/');
        }
        else {
            $this->load->view('utang/base', $data);
        }
    }
    
    public function help() {
        $data['page_view'] = "utang/help";
        $data['page_title'] = 'Confirm Friend';
        
        $data['current_user'] = $this->session->all_userdata();
        
        if (!$this->ion_auth->logged_in())
        {
          redirect('/utang/login');
        }
        else {
            $this->load->view('utang/base', $data);
        }
    }
}

/* End of file home.php */
/* Location: ./application/controllers/utang.php */

<div data-role='page' data-title='home' id='home'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Home</h3>
    <a onclick='window.location.reload()' data-role='button' data-icon='refresh'>Refresh</a>
    <a href='/utang/add' data-role='button' data-icon='plus'>Add</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 50px 0px;'>
    <ul data-role='listview'>
      <?php 
        $amount_color = 1;
        $amount = 0;
        // get friends list
        $query = $this->db->get_where('utang_user', array('user_email' => $sessiondata->email));
        $row = $query->row(); 
        if(json_decode($row->user_friends) != NULL) {
          $friends = json_decode($row->user_friends, true); // to array
        }
        else {
          $friends = array();
        }
        // run a query for each friend
        foreach($friends as $key => $value):
          // print only verified friends  
          if($value != 0) {
              // get a user name
              $this->db->select('user_name');
              $query = $this->db->get_where('utang_user', array('user_email' => $key));
              $utang_user = $query->row();
              // get the user's total transaction
              // get the negative value first
              $this->db->select_sum('trans_amount');
              $query = $this->db->get_where('utang_transaction', array('trans_sender' => $sessiondata['email'], 'trans_recipient' => $key, 'trans_action' => 2));
              $row = $query->row();
              $amount_negative = $row->trans_amount;
              $this->db->select_sum('trans_amount');
              $query = $this->db->get_where('utang_transaction', array('trans_sender' => $key, 'trans_recipient' => $sessiondata['email'], 'trans_action' => 1));
              $row = $query->row();
              $amount_negative += $row->trans_amount;
              // then get the positive value
              $this->db->select_sum('trans_amount');
              $query = $this->db->get_where('utang_transaction', array('trans_sender' => $sessiondata['email'], 'trans_recipient' => $key, 'trans_action' => 1));
              
              $row = $query->row();
              $amount_positive = $row->trans_amount;
              $this->db->select_sum('trans_amount');
              $query = $this->db->get_where('utang_transaction', array('trans_sender' => $key, 'trans_recipient' => $sessiondata['email'], 'trans_action' => 2));
              $row = $query->row();
              $amount_positive += $row->trans_amount;
              // calculate the total
              $amount = $amount_positive - $amount_negative;
              // get the latest transaction
              $this->db->where('trans_sender', $sessiondata['email']);
              $this->db->or_where('trans_recipient', $sessiondata['email']);
              $query = $this->db->get('utang_transaction');
              foreach($query->result() as $row) {
                $latest_activity = $row->trans_timestamp;
              } 
              // setup for display
              if($amount < 0.0) {
                $amount *= -1;
                $amount_prefix = 'You need to return $';
                $amount_color = "color:red;";
              }
              else {
                $amount_prefix = 'You need to collect $';
                $amount_color = "color:green;";
              }
          }
          else {
              continue;
          }
      ?>
      <li class='user' name='<?php echo $utang_user->user_name; ?>'>
        <a>
          <h3 class='ui-li-heading'><?php echo $utang_user->user_name; ?></h3>
          <p class='ui-li-desc' style='font-weight:bold; <?php echo $amount_color; ?>'><?php echo $amount_prefix . $amount; ?></p>
          <p class='ui-li-desc date' style='font-style:italic;'>Last activity on <?php echo isset($latest_activity) ? $latest_activity : 'N/A'; ?></p>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div><!-- content container -->
  
  <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'>
    <div data-role="controlgroup" data-type="horizontal">
      <a href="/utang/home" data-role="button" data-icon="home" data-iconpos='top' style='width:33%'>Home</a>
      <a href="/utang/activity" data-role="button" data-icon="star" data-iconpos='top' style='width:33%'>Activity</a>
      <a href="/utang/settings" data-role="button" data-icon="gear" data-iconpos='top' style='width:33%'>Settings</a>
    </div>
  </div>

</div><!-- index container -->

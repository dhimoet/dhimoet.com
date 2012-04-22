<div data-role='page' data-title='activity' id='activity'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Activity</h3>
    <a onclick='window.location.reload()' data-role='button' data-icon='refresh'>Refresh</a>
    <a href='/utang/add' data-role='button' data-icon='plus'>Add</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 80px 0px;'>
    <ul data-role='listview'>
      <?php 
        $prefix = 1;
        foreach($this->transactions as $transaction):
             
            if($transaction->trans_recipient == $this->sessiondata['email'] && $transaction->trans_action == 1) {
              $prefix = 1;
            }
            elseif($transaction->trans_recipient == $this->sessiondata['email'] && $transaction->trans_action == 2) {
              $prefix = 0;
            }
            elseif($transaction->trans_sender == $this->sessiondata['email'] && $transaction->trans_action == 1) {
              $prefix = 0;
            }
            elseif($transaction->trans_sender == $this->sessiondata['email'] && $transaction->trans_action == 2) {
              $prefix = 1;
            }  
            
            if($transaction->trans_sender == $this->sessiondata['email']) {
                $subject = $transaction->trans_recipient;
            } else {
                $subject = $transaction->trans_sender;
            }
      ?>
      <li class='activity' name='<?php echo $subject; ?>' rel='<?php echo $transaction->trans_id; ?>'>
        <a href=''>
          <h3 class='ui-li-heading'><?php echo $this->friend[$subject]; ?></h3>
          <p class='ui-li-desc' style='font-weight:bold; color:<?php echo ($prefix)?'green':'red';?>;'>
              <?php
                  if($prefix) {
                    echo 'You received $' . $transaction->trans_amount;
                  }
                  else {
                    echo 'You gave $' . $transaction->trans_amount;
                  }
              ?>
          </p>
          <p class='ui-li-desc date' style='font-style:italic;'><?php echo $transaction->trans_timestamp; ?></p>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div><!-- content container -->
  
  <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'>
    <div data-role="controlgroup" data-type="horizontal">
      <a href="/utang/home/" data-role="button" data-icon="home" data-iconpos='top' style='width:33%'>Home</a>
      <a href="/utang/activity/" data-role="button" data-icon="star" data-iconpos='top' style='width:33%'>Activity</a>
      <a href="/utang/settings/" data-role="button" data-icon="gear" data-iconpos='top' style='width:33%'>Settings</a>
    </div>
  </div>

</div><!-- index container -->

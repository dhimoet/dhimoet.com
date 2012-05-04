<div data-role='page' data-title='home' id='home'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Home</h3>
    <a onclick='window.location.reload()' data-role='button' data-icon='refresh'>Refresh</a>
    <a href='/utang/add/' data-role='button' data-icon='plus'>Add</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 80px 0px;'>
    <ul data-role='listview'>
      <?php 
        if(isset($this->is_new) && $this->is_new) {
            echo '<li>You have not added any friends. Go to Settings and Add a Friend by entering his/her registered email address.</li>';
            echo '<li>Once you have added a friend, you can start adding your transactions to the activity list by tapping on the Add button on the top right corner.</li>';
            echo '<li>Tips: Tap on Remember Me before you login, and bookmark this page for easier access.</li>';
        }
        if(!isset($this->friend)) {
            $this->friend = array();
        }
        foreach($this->friend as $friend):
          if($friend['status'] > 0): 
      ?>
      <li class='user' rel='<?php echo $friend['email'].':'.$friend['amount']; ?>'>
        <a>
          <h3 class='ui-li-heading'><?php echo $friend['username']; ?></h3>
          <p class='ui-li-desc' style='font-weight:bold; color:<?php echo ($friend['amount'] < 0)?'red':'green';?>;'>
            <?php
              if($friend['amount'] < 0) {
                echo 'You should collect $' . money_format('%i', (-1 * $friend['amount']));
              }
              else {
                echo 'You must return $' . money_format('%i', $friend['amount']);
              }
            ?>
          </p>
          <p class='ui-li-desc date' style='font-style:italic;'>Last activity on <?php echo date_format(date_create($friend['last_date']), 'M d, Y'); ?></p>
        </a>
      </li>
      <?php endif; endforeach; ?>
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

<div data-role='page' data-title='summary' id='summary'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Summary</h3>
    <a data-rel="back" data-role='button' data-icon='back'>Back</a>
    <a href='/utang/add/' data-role='button' data-icon='plus'>Add</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 80px 0px;'>
    
    <div class='ui-grid-a'>
      <div class="ui-block-a"><h3 style=''><?php echo $this->friend['name']; ?></h3></div>
      <div class="ui-block-b">
        <p style='text-align:right; font-weight:bold; color:<?php echo ($this->friend['amount'] < 0)?'red':'green';?>;'>
          <?php
            if($this->friend['amount'] < 0) {
              echo '$' . money_format('%i', (-1 * $this->friend['amount']));
            }
            else {
              echo '$' . money_format('%i', $this->friend['amount']);
            }
          ?>
        </p>
      </div>
    </div>
    
    <ul data-role='listview'>
      <?php 
        $prefix = 1;
        foreach($this->transactions as $transaction):
             
            if($transaction->trans_recipient == $this->friend['email'] && $transaction->trans_action == 1) {
              $prefix = 0;
            }
            elseif($transaction->trans_recipient == $this->friend['email'] && $transaction->trans_action == 2) {
              $prefix = 1;
            }
            elseif($transaction->trans_sender == $this->friend['email'] && $transaction->trans_action == 1) {
              $prefix = 1;
            }
            elseif($transaction->trans_sender == $this->friend['email'] && $transaction->trans_action == 2) {
              $prefix = 0;
            }  
      ?>
      <li class='activity' rel='<?php echo $transaction->trans_id; ?>'>
        <div class='ui-grid-a'>
          <h3 class='ui-block-a ui-li-heading'><?php echo $transaction->trans_description; ?></h3>
          <p class='ui-block-b ui-li-desc' style='margin-top:10px; text-align:right; font-weight:bold; color:<?php echo ($prefix)?'green':'red';?>;'>
            <?php
              if($prefix) {
                echo 'You received $' . money_format('%i', $transaction->trans_amount);
              }
              else {
                echo 'You gave $' . money_format('%i', $transaction->trans_amount);
              }
            ?>
          </p>
        </div>
        <p class='ui-li-desc date' style='font-style:italic;'><?php echo date_format(date_create($transaction->trans_timestamp), 'M d, Y'); ?></p>
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

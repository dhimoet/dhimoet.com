<div data-role='page' data-title='details' id='details'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Details</h3>
    <a data-rel="back" data-role='button' data-icon='back'>Back</a>
    <a href='/utang/add/' data-role='button' data-icon='plus'>Add</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 80px 0px;'>
    
    <p>Transaction with:</p>
    <h3>
    <?php 
        echo $this->transaction->username;
    ?>
    </h3>
    
    <p>Action:</p>
    <?php
        if(($this->transaction->is_sender && $this->transaction->trans_action == 1) || (!$this->transaction->is_sender && $this->transaction->trans_action ==2)) {
            $message = 'You gave $'. $this->transaction->trans_amount .' to this user on '. $this->transaction->trans_timestamp;
            $color = 'red';
        }
        elseif(($this->transaction->is_sender && $this->transaction->trans_action ==2) || (!$this->transaction->is_sender && $this->transaction->trans_action == 1)) {
            $message = 'You received $'. $this->transaction->trans_amount .' from this user on '. $this->transaction->trans_timestamp;
            $color = 'green';
        }
    ?>
    
    <h3 style='color:<?php echo $color; ?>;'>
        <?php echo $message; ?>
    </h3>
    
    <p>Descriptions:</p>
    <h3>
    <?php 
        echo $this->transaction->trans_description;
        if($this->transaction->trans_additional) {
            echo '<br />' . $this->transaction->trans_additional;
        } 
    ?>
    </h3>
    
  </div><!-- content container -->
  
  <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'>
    <div data-role="controlgroup" data-type="horizontal">
      <a href="/utang/home/" data-role="button" data-icon="home" data-iconpos='top' style='width:33%'>Home</a>
      <a href="/utang/activity/" data-role="button" data-icon="star" data-iconpos='top' style='width:33%'>Activity</a>
      <a href="/utang/settings/" data-role="button" data-icon="gear" data-iconpos='top' style='width:33%'>Settings</a>
    </div>
  </div>

</div><!-- index container -->

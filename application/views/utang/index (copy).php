<script type="text/javascript">
  var user_id;
  window.top.scrollTo(0, 1);
  $(document).ready(function() {
    
    $('#refresh').click(function() {
      location.reload();  
    });
    
    $('.account_summary').click(function() {
      $('#home').fadeOut();
      
      $.ajax({
        url: 'http://www.google.com',
        success: function(response) {
          $('#body').html(response);
        }
      });
      
    });
    
  });
</script>

<div id='utang'>
  <!-- utang container -->
  
  <div id='nav_top'>
    <!-- nav_top container -->
    
    <div class='left'>
      <input type='button' class='button' value='Refresh' id='refresh' />
    </div>
    
    <div class='center'>
      <p>Utang Mengutang</p>
    </div>
    
    <div class='right'>
      
    </div>
    
    <!-- end of nav_top container -->
  </div>
  
  <div id='home'>
    <!-- home container -->
    
<?php 
  $sql = 'select * from utang_user';
  $query = $this->db->query($sql);
  foreach($query->result() as $row): 
?>
    <div class='account_summary' id='user_<?php echo $row->user_id; ?>'>
      <!-- account_summary container -->
      
      <p class='name'><?php echo $row->user_name; ?></p>
      <p class='amount'>Own: $50.00</p>
      <p class='activity'>Last activity: 2012/03/23</p>
      
      <!-- end of account_summary container -->
    </div>
<?php endforeach; ?>
    
    <!-- end of home container -->
  </div>
  
  <div id='body'></div>
  
  <div id='nav_bottom'>
    <!-- nav_bottom container -->
    
    <div id='summary'>
      <p>My Summary</p>
    </div>
    
    <div id='settings'>
      <p>Settings</p>
    </div>
    
    <!-- end of nav_bottom container -->
  </div>
  
  <!-- end of utang container -->
</div>

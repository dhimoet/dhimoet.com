  <div id='account_details'>
    <!-- account_details container -->

    <div id='header'>
      <!-- header container -->

<?php 
  //$sql = 'select * from utang_user where user_id = ' .$_POST['user_id'];
  //$query = $this->db->query($sql);
  //$row = $query->row();
?>      
      <p class='name'><?php echo $_POST['user_id']; ?></p>
      <p class='amount'>Own: $50.00</p>
      
      <!-- end of header container -->
    </div>
    
    <div id='content'>
      <!-- content container -->
      
      <div class='activity'>
        <!-- activity container -->
        
        <div class='date'>2012/03/23</div>
        <div class='amount'>Delivered $25.00</div>
        <div class='description'>Food</div>
        
        <!-- end of activity container -->
      </div>
      
      <div class='activity'>
        <!-- activity container -->
        
        <div class='date'>2012/03/22</div>
        <div class='amount'>Delivered $25.00</div>
        <div class='description'>Item</div>
        
        <!-- end of activity container -->
      </div>
      
      <!-- end of content container -->
    </div>
    
    <!-- end of account_details container -->
  </div>

<div class='container_16' id='visitors'>
  <!-- visitors container -->
  
  <div class='grid_16 alpha omega' id='menu'>
  
    <form name='data_interval' action='' method='get'>
      <!-- data_interval container -->
      
      <label for='total_data'>Number of entries to show:</label>
      <select name='total_data'>
        <option value='10'>10</option>
        <option value='20'>20</option>
        <option value='50'>50</option>
        <option value='100'>100</option>
      </select>
      <input type='submit' value='Refresh' />
      
      <!-- data_interval container -->
    </form>
      
  </div>
  
  <div class='grid_16 alpha omega' id='list_header'>
    
    <div class='background'>&nbsp;</div>
      
    <div class='grid_4 alpha omega'>
      <p>DATE</p>
    </div>
    <div class='grid_4 alpha omega'>
      <p>IP ADDRESS</p>
    </div>
    <div class='grid_4 alpha omega'>
      <p>REQUEST URI</p>
    </div>
    <div class='grid_4 alpha omega'>
      <p>USER AGENT</p>
    </div>
    
  </div>
  
  <div class='grid_16 alpha omega' id='list_content'>
    <!-- list_content container -->
    
<?php 
  // Read the request
  // If request is empty, set the request to today only
  // Else run the query as it is
  // Pull data from databse
  $sql = 'select * from event_logger order by event_id desc';
  $query = $this->db->query($sql);
  
  // Display data from database showing only 20 first rows
  $i = 1;
  if(isset($_GET['total_data'])) {
    $max = $_GET['total_data'];
    echo $max;
  }
  else {
    $max = 10;
  }
  foreach($query->result() as $row):
    if($i++ > $max) continue;
    $server = json_decode($row->event_message);
?>
    <div class='grid_4 alpha omega date'>
      <p><?php echo $row->logged_time; ?> EST</p>
    </div>
    
    <div class='grid_4 alpha omega address'>
      <a href='http://whatismyipaddress.com/ip/<?php echo $server->REMOTE_ADDR; ?>' target='_BLANK'>
        <p><?php echo $server->REMOTE_ADDR; ?></p>
      </a>
    </div>
    
    <div class='grid_4 alpha omega uri'>
      <p><?php echo $server->REQUEST_URI; ?></p>
    </div>
    
    <div class='grid_4 alpha omega useragent'>
      <p><?php echo $server->HTTP_USER_AGENT; ?></p>
    </div>
    
    <div class='clear'></div> 
<?php endforeach; ?>
    
    <!-- end of list_content container -->
  </div>
  
  <!-- end of visitors container -->
</div>

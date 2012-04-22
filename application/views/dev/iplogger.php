<?php
  /**
   * This function logs Server and execution environment information
   */
  
  // Read $_SERVER array and store it in json format
  $server = json_encode($_SERVER);
  
  // Store json data into database
  $sql = 'insert into `event_logger` (event_message) value (?)';
  $this->db->query($sql, array($server));
?>
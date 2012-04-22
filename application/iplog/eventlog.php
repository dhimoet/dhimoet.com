<?php

  function eventLog() {
    /* Open a database connection */
    /* Check if database connection is open */
    /* If it is open, then close it first */
    if(isset($db)) {
      mysql_close($db);
    }
  
    /* Open a new database connection */
    $dhost    = "localhost";
    $dbase    = "dhimoet_";
    $duser    = "dhimoet_dev";
    $dpass    = "D3v123";
  
    $db = mysql_connect($dhost, $duser, $dpass);
    mysql_select_db($dbase);
  
    $target_table = "event_logger";
    
    /* Read / process the event */
    $event = "HTTP_USER_AGENT: " .$_SERVER['HTTP_USER_AGENT'] ."\n"
             ."HTTP_ACCEPT: " .$_SERVER['HTTP_ACCEPT'] ."\n"
             ."REMOTE_ADDR: " .$_SERVER['REMOTE_ADDR'] ."\n"
             ."REMOTE_PORT: " .$_SERVER['REMOTE_PORT'] ."\n"
             ."REQUEST_METHOD: " .$_SERVER['REQUEST_METHOD'] ."\n"
             ."PHP_SELF: " .$_SERVER['PHP_SELF'] ."\n"
             ."REQUEST_TIME: " .$_SERVER['REQUEST_TIME'] ."\n";

    /* Save the processed event to the database */
    $sql = "insert into $target_table (event_message) values (\"{$event}\")";
    $result = mysql_query($sql);
    
    /* Close database connection */
    mysql_close($db);
    
    /* Log client's IP address and time to a text file */
    date_default_timezone_set('EST');
    $ipAddr = $_SERVER['REMOTE_ADDR'];
    $faccess = "iplog.txt";
    $fh = fopen($faccess, 'a') or die("error");
    fwrite($fh, date('Y-m-d H:i:s') ." ". $ipAddr ."\n");
    fclose($fh);
  }

?>

<?php

  function eventLog() {
    /* Open a database connection */
    /* Check if database connection is open */
    /* If it is open, then close it first */
    if($db != "") {
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

    /* Get additional information from http://whatismyipaddress.com */
    $info = array();
    $event_additional = "";
    $html = file("http://whatismyipaddress.com/ip/{$_SERVER[REMOTE_ADDR]}");
    foreach($html as $line) {
      if( preg_match("/Hostname:/", $line) ) {
        preg_match("/[a-z]+\.[a-z0-9\-\_\.]+\.[a-z]{1,3}/i", $line, $matches);
        $info['Hostname'] = strip_tags($matches[0]);
      }
      if( preg_match("/Country:/", $line) ) {
        preg_match("/[A-Z].*/", $line, $matches);
        $info['Country'] = substr( strip_tags($matches[0]), 8);
      }
      if( preg_match("/State\/Region:/", $line) ) {
        preg_match("/[A-Z].*/", $line, $matches);
        $info['State/Region'] = substr( strip_tags($matches[0]), 13);
      }
      if( preg_match("/City:/", $line) ) {
        preg_match("/[A-Z].*/", $line, $matches);
        $info['City'] = substr( strip_tags($matches[0]), 5);
      }
    }
    foreach($info as $key => $value) {
      $event_additional =  $event_additional .$key .": ". $value ."\n";
    }
    
    /* Read / process the event */
    $event = "HTTP_USER_AGENT: " .$_SERVER[HTTP_USER_AGENT] ."\n"
             ."HTTP_ACCEPT: " .$_SERVER[HTTP_ACCEPT] ."\n"
             ."REMOTE_ADDR: " .$_SERVER[REMOTE_ADDR] ."\n"
             ."REMOTE_PORT: " .$_SERVER[REMOTE_PORT] ."\n"
             ."REQUEST_METHOD: " .$_SERVER[REQUEST_METHOD] ."\n"
             ."PHP_SELF: " .$_SERVER[PHP_SELF] ."\n"
             ."REQUEST_TIME: " .$_SERVER[REQUEST_TIME] ."\n"
             .$event_additional;

    /* Save the processed event to the database */
    $sql = "insert into $target_table (event_message) values (\"{$event}\")";
    $result = mysql_query($sql);
    
    /* Close database connection */
    mysql_close($db);
    
    /* Log client's IP address and time to a text file */
    date_default_timezone_set('EST');
    $ipAddr = $_SERVER[REMOTE_ADDR];
    $faccess = "iplog/iplog.txt";
    $fh = fopen($faccess, 'a') or die("error");
    fwrite($fh, date('Y-m-d H:i:s') ." ". $ipAddr ."\n");
    fclose($fh);
  }

?>

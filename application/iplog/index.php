<?php    
    /* Get additional information from http://whatismyipaddress.com */
    $info = array();
    $event_additional = "";
    $html = file("");
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
?>

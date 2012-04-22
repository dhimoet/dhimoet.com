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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
  <META content='INDEX,FOLLOW' name='ROBOTS'></META>
  <meta content="dhimoet, adhika, mahendra, adhika mahendra, indonesia" name='Keywords'/>
  <meta content="Dhimoet | Official website of Adhika Mahendra, Software and Web Developer." name='Description'/>
  <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
  
<?php foreach($page_css as $item): ?>
  <link rel="stylesheet" type="text/css" href="/static/css/<?php echo $item; ?>.css" />
<?php endforeach; ?>

<?php if(isset($page_css_external)) foreach($page_css_external as $item): ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $item; ?>" />
<?php endforeach; ?>
  
<?php foreach($page_js as $item): ?>
  <script type="text/javascript" src="/static/js/<?php echo $item; ?>.js"></script>
<?php endforeach; ?>

<?php if(isset($page_js_external)) foreach($page_js_external as $item): ?>
  <script type="text/javascript" src="<?php echo $item; ?>"></script>
<?php endforeach; ?>
  
  <title>Dhimoet.com | <?php echo $page_title; ?></title>
  
</head>
<body>
  
<?php $this->load->view($view_location); ?>

</body>
</html>

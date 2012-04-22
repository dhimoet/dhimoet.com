<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
  <META content='INDEX,FOLLOW' name='ROBOTS'></META>
  <meta content="dhimoet, adhika, mahendra, adhika mahendra, indonesia" name='Keywords'/>
  <meta content="Dhimoet | Official website of Adhika Mahendra, Software and Web Developer." name='Description'/>
  <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  
  <link rel="stylesheet" type="text/css" href="/static/css/jquery.mobile-1.0.1.min.css" />
  <script type="text/javascript" src="/static/js/jquery-1.6.4.min.js"></script>
  <script type="text/javascript" src="/static/js/jquery.mobile-1.0.1.min.js"></script>

<script type='text/javascript'>
$(document).bind('pagebeforecreate', function() {
  $('.user').click(function() {
    $.mobile.changePage( "/utang/summary/", {
	    type: "get", 
	    data: 'data=' + $(this).attr("rel")
    });
  });
  
  $('.activity').click(function() {
    $.mobile.changePage( "/utang/details/", {
	    type: "get", 
	    data: 'trans_id=' + $(this).attr("rel")
    });
  });
  
  $('.listitem').click(function() {
    $.mobile.changePage( "/utang/confirmfriend/", {
      type: "get", 
      data: 'whichfriend=' + $(this).html()
    });
  });
  
  $('#submit').click(function() {
    $.mobile.changePage( "/utang/add/", {
	    type: "post", 
	    data: $('form').serialize()
    });
  });
});
</script>
  
  <title>Dhimoet.com | <?php echo $page_title; ?></title>
  
</head>
<body>
  
  <?php $this->load->view($page_view); ?>

</body>
</html>

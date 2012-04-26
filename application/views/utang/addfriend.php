<script>
    $(document).ready(function() {
        if(<?php echo (isset($_REQUEST['fail']))?$_REQUEST['fail']:0; ?>) {
            alert('Request failed. Please try again!');
        }
    });
</script>

<div data-role='page' data-title='addfriend' id='addfriend'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Add a Friend</h3>
    <a data-rel="back" data-role='button' data-icon='back'>Back</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 50px 0px;'>
    <form name='addfriend' action="/utang/addfriend/" method="post" id='addfriend' data-ajax="false">
      <!-- form container -->
      
      <label for='email'>Friend's email:</label>
      <input type="text" name="email" id="email" placeholder='user@email.com' />
      
      <label for="additional">Additional message:</label>
      <textarea name="additional" id="additional"></textarea>
      
      <input type='submit' value='Add Now!' data-theme='b' />
      
      <!-- end of form container -->
    </form>
  </div><!-- content container -->
  
  <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'>
    <div data-role="controlgroup" data-type="horizontal">
      <a href="/utang/home/" data-role="button" data-icon="home" data-iconpos='top' style='width:33%'>Home</a>
      <a href="/utang/activity/" data-role="button" data-icon="star" data-iconpos='top' style='width:33%'>Activity</a>
      <a href="/utang/settings/" data-role="button" data-icon="gear" data-iconpos='top' style='width:33%'>Settings</a>
    </div>
  </div>

</div><!-- index container -->

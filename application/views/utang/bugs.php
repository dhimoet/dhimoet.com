<div data-role='page' data-title='addfriend' id='bugs'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Ideas? Bugs?</h3>
    <a data-rel="back" data-role='button' data-icon='back'>Back</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 50px 0px;'>
    <form name='bugs' action="/utang/bugs/" method="get" id='bugs' data-ajax="false">
      <!-- form container -->
      
      <label for='title'>Brief information:</label>
      <input type="text" name="title" id="title" value="" />
      
      <label for="text">Please give me detailed but understandable information:</label>
      <textarea name="text" id="text" style='height:100px;'></textarea>
      
      <input type='submit' value='Report!' data-theme='b' />
      
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

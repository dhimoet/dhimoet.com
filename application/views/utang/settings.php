  <div data-role='page' data-title='settings' id='settings'>
  
    <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
      <h3>Settings</h3>
      <a onclick='window.location.reload()' data-role='button' data-icon='refresh'>Refresh</a>
      <a href='/utang/add/' data-role='button' data-icon='plus'>Add</a>
    </div>
    
    <div data-role='content' style='margin:40px 0px 80px 0px;'>
      
      <ul data-role='listview' data-inset='true'>
        <li>
          <a href='/utang/addfriend/'>Add a Friend</a>
        </li>
        <li>
          <a href='/utang/notifications/'>Notifications</a>
        </li>
        <li>
          <a href='/utang/password/'>Change Password</a>
        </li>
        <li>
          <a href='/utang/bugs/'>Tell me what is wrong
              <?php echo (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)?'&#xE056;':':)'; ?>
          </a>
        </li>
        <li>
          <a href='/utang/help/'>Help</a>
        </li>
      </ul>
      
      <a href='/auth/logout' data-role='button' data-theme='e'>Log Out</a>
      
    </div><!-- content container -->
    
    <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'>
      <div data-role="controlgroup" data-type="horizontal">
        <a href="/utang/home/" data-role="button" data-icon="home" data-iconpos='top' style='width:33%'>Home</a>
        <a href="/utang/activity/" data-role="button" data-icon="star" data-iconpos='top' style='width:33%'>Activity</a>
        <a href="/utang/settings/" data-role="button" data-icon="gear" data-iconpos='top' style='width:33%'>Settings</a>
      </div>
    </div>

  </div><!-- index container -->

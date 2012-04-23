  <div data-role='page' data-title='settings' id='notifications'>
  
    <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
      <h3>Notifications</h3>
      <a data-rel="back" data-role='button' data-icon='back'>Back</a>
      <a onclick='window.location.reload()' data-role='button' data-icon='refresh'>Refresh</a>
    </div>
    
    <div data-role='content' style='margin:40px 0px 80px 0px;'>
      
      <ul data-role='listview'>
        <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-bar-d">Friend Requests</li>
        <?php
          if(isset($this->friends_object)):
          foreach($this->friends_object as $key => $value):
            if($value === 0): 
        ?>
        <li>
          <a data-rel='dialog' class='listitem'><?php echo $key; ?></a>
        </li>
        <?php endif; endforeach; endif; ?>
      </ul>
      <form method='get' action='/utang/confirmfriend/' id='hiddenform'>
        <input type='hidden' name='whichfriend' id='whichfriend' value='' />
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

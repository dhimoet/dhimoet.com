  <div data-role="dialog" data-url="/utang/confirmfriend" data-external-page="true" tabindex="0" class="ui-page ui-body-c ui-dialog ui-overlay-a ui-page-active" style="min-height: 491px; ">
    
    <div data-role="header" data-theme="d" class="ui-corner-top ui-header ui-bar-d" role="banner">
      <a href="#" data-icon="delete" data-iconpos="notext" class="ui-btn ui-btn-up-d ui-shadow ui-btn-corner-all ui-btn-icon-notext" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="d" title="Close">
        <span class="ui-btn-inner ui-btn-corner-all">
          <span class="ui-btn-text">Close</span>
          <span class="ui-icon ui-icon-delete ui-icon-shadow">&nbsp;</span>
        </span>
      </a>
      <h1 class="ui-title" role="heading" aria-level="1">Friend Request</h1>
    </div>

    <div data-role="content" data-theme="c" class="ui-corner-bottom ui-content ui-body-c" role="main">
      <h1>Confirm friend?</h1>
      <p>Confirming <strong><?php echo $_GET['whichfriend']; ?></strong> will enable you to see all the activities added by that person.</p> 
      <form action='/utang/confirmfriend' method='get'>
        <input type='hidden' name='confirmfriend' value='<?php echo $_GET['whichfriend']; ?>' />
        <input type='submit' value='Confirm' data-theme="b" />     
      </form>
      <a href="/utang/notifications" data-role="button" data-rel="back" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-up-c">
        <span class="ui-btn-inner ui-btn-corner-all">
          <span class="ui-btn-text">Not now</span>
        </span>
      </a>    
    </div>
    
  </div>

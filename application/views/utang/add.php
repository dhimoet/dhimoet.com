<div data-role='page' data-title='add' id='add'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Add a Transaction</h3>
    <a data-rel="back" data-role='button' data-icon='back'>Back</a>
  </div>
  
  <div data-role='content' style='margin:40px 0px 80px 0px;'>
    <form name='add' action="/utang/add/" method="post" id='add' data-ajax="false">
    
      <label for="add[email]" class="select">Interaction with:</label>
      <select name="add[email]" id="email">
        <?php 
          // run a query for each friend
          foreach($this->users as $key => $value):
        ?>
        <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
        <?php endforeach; ?>
      </select>
    
      <label for='add[action]'>Action:</label>
      <div class="ui-grid-a">
        <div class="ui-block-a">
          <select name='add[action]' id='action'>
            <option value='1'>I gave</option>
            <option value='2'>I received</option>
          </select>
        </div>
        
        <div class="ui-block-b" style='margin-top:11px; text-align:right;'>  
            <label for='add[amount]' style='display:inline;'>$</label>
            <input type="text" name="add[amount]" id="amount" placeholder="0.00" style='display:inline; width:80%; text-align:right;' />
        </div>
        
      </div><!-- ui-grid-a container -->
    
      <label for="add[description]">Description:</label>
      <input type="text" name="add[description]" id="description" value=""  />
    
      <label for="add[additional]">Additional description:</label>
      <textarea name="add[additional]" id="additional"></textarea>
      
      <input type='submit' value='Add Now!' data-theme='b' />
    
    </form><!-- form container -->
  </div><!-- content container -->
  
  <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'>
    <div data-role="controlgroup" data-type="horizontal">
      <a href="/utang/home/" data-role="button" data-icon="home" data-iconpos='top' style='width:33%'>Home</a>
      <a href="/utang/activity/" data-role="button" data-icon="star" data-iconpos='top' style='width:33%'>Activity</a>
      <a href="/utang/settings/" data-role="button" data-icon="gear" data-iconpos='top' style='width:33%'>Settings</a>
    </div>
  </div>

</div><!-- index container -->

<div data-role='page' data-title='index' id='index'>
  
  <div data-theme='b' data-role='header' data-position='fixed'>
    <h3>Utang Mengutang</h3>
  </div>
  
  <div data-role='content'>
    
    <form name='login' action='/utang/login/' method='post'>
      
      <p>
      	<label for="email">Email:</label>
      	<input type='text' name='email' />
      </p>
      
      <p>
      	<label for="password">Password:</label>
      	<input type='text' name='password' />
      </p>
      
      <label><input type="checkbox" name="remember" /> Remember Me </label>
          
      <input type='submit' name='login' value='Login' />
      
    </form>
    
  </div><!-- content container -->
  
  <div data-role='header' style='position:fixed; bottom:0px;'></div>

</div><!-- index container -->

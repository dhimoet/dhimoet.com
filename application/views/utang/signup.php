<div data-role='page' data-title='signup' id='signup'>
  
  <div data-theme='b' data-role='header' style='position:fixed; z-index:999; top:0px;'>
    <h3>Sign Up</h3>
  </div>
  
  <div data-role='content' style='margin:40px 0px 80px 0px;'>
  
    <form name='signup' action='/auth/create_user' method='post'>
 
      <p>
      	<label for="first_name">First Name:</label>
      	<input type='text' name='first_name' value='' />
      </p>
      
      <p>
      	<label for="last_name">Last Name:</label>
      	<input type='text' name='last_name' value='' />
      </p>
      
      <p>
      	<label for="email">Email:</label>
      	<input type='text' name='email' value='' />
      </p>
      
      <p>
      	<label for="password">Password:</label>
      	<input type='password' name='password' value='' />
      </p>
          
      <input type='submit' name='login' value='Sign Up!' data-theme='b'/>
      
    </form>
    
  </div><!-- content container -->
  
  <div data-role='footer' style='position:fixed; z-index: 999; bottom:0px;'></div>

</div><!-- index container -->

<html>
<head>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Mobile Dev</title>
  <script type="text/javascript" src="/static/js/jquery.js"></script>
  <script>
    var page = 1;
    $(document).ready(function() {
      window.top.scrollTo(0, 1);
      $('#next_button').click(function() {
        $('#page_' + page).hide();
        $('#page_' + (++page)).show();
      });
      $('#back_button').click(function() {
        $('#page_' + page).hide();
        $('#page_' + (--page)).show();
      });
      $('.bottom_button').click(function() {
        alert('Not implemented yet!');
      });
    });
  </script>
  <style>
    * {
      margin: 0px;
      padding: 0px;
    }
    #top_nav {
      background-color: gray;
      width: 100%;
      height: 50px;
      position: fixed;
      top: 0px;
    }
    #back_button {
      color: green;
      border: none;
      width: 100px;
      height: 50px;
      position: absolute;
      left: 0px;
      cursor: pointer;
    }
    #next_button {
      color: green;
      border: none;
      width: 100px;
      height: 50px;
      position: absolute;
      right: 0px;
      cursor: pointer;
    }
    #bottom_nav {
      background-color: gray;
      width: 100%;
      height: 50px;
      position: fixed;
      bottom: 0px;
    }
    #bottom_nav .bottom_button {
      color: green;
      border: none;
      width: 24%;
      height: 50px;
      cursor: pointer;
    }
    #body {
      font-family: Arial;
      font-size: 14pt;
      margin: 100px 5%;
    }
    #page_2 {
      display: none;
    }
    #page_3 {
      display: none;
    }
  </style>
</head>

<body>
  <div id='top_nav'>
    <input type='button' id='back_button' value='Back' />
    <input type='button' id='next_button' value='Next' />
  </div>
  <div id='body'>
    <div id='page_1'>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
      <p>PAGE 1</p>
    </div>
    <div id='page_2'>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
      <p>PAGE 2</p>
    </div>
    <div id='page_3'>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
      <p>PAGE 3</p>
    </div>
  </div>
  <div id='bottom_nav'>
    <input type='button' id='menu_1' class='bottom_button' value='A' />
    <input type='button' id='menu_2' class='bottom_button' value='B' />
    <input type='button' id='menu_3' class='bottom_button' value='C' />
    <input type='button' id='menu_4' class='bottom_button' value='D' />
  </div>
</body>
</html>
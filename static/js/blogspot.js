$(document).ready(function() {
  $('#real_body').css('opacity', '0.2');
  $('#no').click(function() {
    $('#welcome_window').hide();
    $('#real_body').css('opacity', '1');
  });  
});

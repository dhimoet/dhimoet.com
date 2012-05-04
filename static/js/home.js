$(document).ready(function(){
  $('.item_icon > a').click(function(){
    // Show description
    var hash_name = $(this).attr('rel');
    $('.item_description').slideUp();
    $('#twitter').fadeOut();
    $(hash_name).delay(400).slideDown();
    
    // Animate clicked icon
    $().animate();
    $('.item_icon > a').removeClass('active');
    $(this).addClass('active');
  });
  
  $('.close').click(function() {
    // Close description
    $('.item_description').slideUp();
    $('.item_icon > a').removeClass('active');
    $('#twitter').delay(400).fadeIn();
  });
});

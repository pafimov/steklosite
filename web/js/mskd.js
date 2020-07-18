(function( $ ){
	
    var $body;
  
    $(document).ready(function(){
      $body = $('body');
  
      $body
        .find('.user-phone').each(function(){
            $(this).mask("+7 (999) 999-99-99", {autoсlear: false});
        });
  
      $body.on('keyup','.user-phone',function(){
        var phone = $(this),
            phoneVal = phone.val(),
            form = $(this).parents('form');
  
        if ( (phoneVal.indexOf("_") != -1) || phoneVal == '' ) {
          form.find('.btn_submit').attr('disabled',true);
        } else {
          form.find('.btn_submit').removeAttr('disabled');
        }
      });
  
    });
  
  })( jQuery );
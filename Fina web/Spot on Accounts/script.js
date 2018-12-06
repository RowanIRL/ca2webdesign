$(function () {
    $('#contact-form').validator();
    $('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()){
            var URL="conact.php";
            
            $.ajax({
                type:"POST",
                url: url,
                data: $(this).serialize(),
                success:function (data)
                {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismmiss+"alert" ariah-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    if (messageAlert && messageText) {
                        
                        $('#contact-form').find('.messages').html(alertbox);
                        
                        $('#contact-form')[0].reset();
                    }
                
                }
            });
            return false;
        }
    })
});

$(document).ready(function(){
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {


    event.preventDefault();

    
    var hash = this.hash;

   $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   
      
      window.location.hash = hash;
    });
  });
  
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})

$(function(){




   $('.column-image').hover(
         function(){
           $(this).addClass('column-hover');
           $(this).children('.zoom-black').fadeIn(300);
         },
         function(){
           $(this).removeClass('column-hover');
           $(this).children('.zoom-black').fadeOut(300);
         });


   $('.filter-item').click(
        function(){
          $('.filter-item').removeClass('active');
          $(this).addClass('active');
          var category = $(this).attr('id');
          if(category== 'all'){
            $('.column-box').fadeIn();
          }else if(category=='100'){
            $('.column-box').hide();
            $('.100').fadeIn();
          }else if(category=='200'){
            $('.column-box').hide();
            $('.200').fadeIn();
          }else if(category=='300'){
            $('.column-box').hide();
            $('.300').fadeIn();
          }else if(category=='400'){
            $('.column-box').hide();
            $('.400').fadeIn();
          }else if(category=='500'){
            $('.column-box').hide();
            $('.500').fadeIn();
          };
          
          
        });
});
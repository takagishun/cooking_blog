$(function(){


	
    $(".mypage_menu").hover(
      function(){
            $(".mypage_menu p").css('background-color','#100A04'); 
          },
          function(){
            $(".mypage_menu p").css('background-color','#262626'); 
          });
    $(".header_login").hover(
      function(){
            $(".header_login").css('background-color','#100A04'); 
          },
          function(){
            $(".header_login").css('background-color','#262626'); 
          });


     $(".favor").hover(
      function(){
            $(".favor h2").css('background-color','#100A04'); 
          },
          function(){
            $(".favor h2").css('background-color','#262626'); 
          });

   if($('.mypage_menu').children().hasClass('header_login')){
    $(".modal").hide();
   }else{
    $(".modal").hide();
    $(".mypage_menu").hover(
      function(){
      $(".modal").fadeIn(100);
    }, function(){
      $(".modal").fadeOut(100);
    });
   }


// -----------------------------------------------------------------------
   if($('.mypage_menu').children().hasClass('header_login')){
    
    $(".favor").hover(
      function(){
      $(".loggedin_favor_modal").fadeIn(100);
    }, function(){
      $(".loggedin_favor_modal").fadeOut(100);
    });

   }else{

    $(".favor").hover(
      function(){
      $(".favor_modal").fadeIn(100);
    }, function(){
      $(".favor_modal").fadeOut(100);
    });
   }

    $('.modal input').hover(
      function(){
            $(this).css('text-decoration','underline'); 
          },
          function(){
            $(this).css('text-decoration','none'); 
          });

// -------------------------------------------------------------------------------------
    $('.modal a').hover(
      function(){
            $(this).css('text-decoration','underline'); 
          },
          function(){
            $(this).css('text-decoration','none'); 
          });
    

    // --------------------------------------------------------
    // program

    $(".program").hover(
      function(){
            $(".program h2").css('background-color','#100A04'); 
          },
          function(){
            $(".program h2").css('background-color','#262626'); 
          });


   
    if($('.mypage_menu').children().hasClass('header_login')){
    
    $(".program").hover(
      function(){
      $(".loggedin_program_modal").fadeIn(100);
    }, function(){
      $(".loggedin_program_modal").fadeOut(100);
    });

   }else{

    $(".program").hover(
      function(){
      $(".program_modal").fadeIn(100);
    }, function(){
      $(".program_modal").fadeOut(100);
    });
   }


});
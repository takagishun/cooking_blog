$(function(){

	    


	if ($('#favo').data('condition')==false) {
		$('#favo').addClass('fa fa-heart-o');
		$('#favo').css('color', '#262626');
	}else if($('#favo').data('condition')==true) {
		$('#favo').addClass('fa fa-heart');
		$('#favo').css('color', '#C23E39');

	}else{
		$('#favo').addClass('fa fa-heart-o');
		$('#favo').css('color', '#262626');
	}

	$('#favo').hover(
		function(){
			$('#favo').css('background-color','rgba(255,0,0,0.1)');
		},
		function(){
			$('#favo').css('background-color','');
		}
	);

});




function ajaxFavoFunc(param1,param2){


	if($('#favo').data('condition')==false){

		$.post("addfavo.php",
    		{email:param1,favo_menu_name:param2},
    		function(){

    			$('#favo').removeClass('fa-heart-o');
    			$('#favo').addClass('fa-heart');
    			$('#favo').css('color', '#C23E39');
			    $('#favo').data('condition',true);

    		});
		
		
	}else if($('#favo').data('condition')==true){

		$.post("deletefavo.php",
    		{email:param1,favo_menu_name:param2},
    		function(json){
    			// alert("消しました。");
    			$('#favo').removeClass('fa-heart');
    			$('#favo').addClass('fa-heart-o');
    			$('#favo').css('color', '#262626');
			    //お気に入りボタン状態の更新
			    $('#favo').data('condition',false);
    		});
	}
    

}


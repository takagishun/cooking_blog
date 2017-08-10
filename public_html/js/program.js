function ajaxProgram1Func(param1,param2,param3){


	if($('#program-1').data('condition')==false){

		$.post("addprogram.php",
			{email:param1,program_menu_name:param2,program_number:param3},
    		function(){
    			$('#program-1').css('color', '#C23E39');
			    $('#program-1').data('condition',true);
			    

    		});
		
		
	}else if($('#program-1').data('condition')==true){

		$.post("deleteprogram.php",
			{email:param1,program_menu_name:param2,program_number:param3},
    		function(json){
    			$('#program-1').css('color', '#262626');
			    //お気に入りボタン状態の更新
			    $('#program-1').data('condition',false);
    		});
	}
}


function ajaxProgram2Func(param1,param2,param3){


	if($('#program-2').data('condition')==false){

		$.post("addprogram.php",
			{email:param1,program_menu_name:param2,program_number:param3},
    		function(){
    			$('#program-2').css('color', '#C23E39');
			    $('#program-2').data('condition',true);

    		});
		
		
	}else if($('#program-2').data('condition')==true){

		$.post("deleteprogram.php",
			{email:param1,program_menu_name:param2,program_number:param3},
    		function(json){
    			$('#program-2').css('color', '#262626');
			    //お気に入りボタン状態の更新
			    $('#program-2').data('condition',false);
    		});
	}
}


function ajaxProgram3Func(param1,param2,param3){


	if($('#program-3').data('condition')==false){

		$.post("addprogram.php",
			{email:param1,program_menu_name:param2,program_number:param3},
    		function(){
    			$('#program-3').css('color', '#C23E39');
			    $('#program-3').data('condition',true);

    		});
		
		
	}else if($('#program-3').data('condition')==true){

		$.post("deleteprogram.php",
			{email:param1,program_menu_name:param2,program_number:param3},
    		function(json){
    			$('#program-3').css('color', '#262626');
			    //お気に入りボタン状態の更新
			    $('#program-3').data('condition',false);
    		});
	}
    

}





$(function(){

	    


	if ($('#program').data('condition')==false) {
		$('#program').css('color', '#262626');
	}else if($('#program').data('condition')==true) {
		$('#program').css('color', '#C23E39');

	}else{
		$('#program').css('color', '#262626');
	}


	if ($('#program-1').data('condition')==false) {
		$('#program-1').css('color', '#262626');
	}else if($('#program-1').data('condition')==true) {
		$('#program-1').css('color', '#C23E39');

	}else{
		$('#program-1').css('color', '#262626');
	}


	if ($('#program-2').data('condition')==false) {
		$('#program-2').css('color', '#262626');
	}else if($('#program-2').data('condition')==true) {
		$('#program-2').css('color', '#C23E39');

	}else{
		$('#program-2').css('color', '#262626');
	}


	if ($('#program-3').data('condition')==false) {
		$('#program-3').css('color', '#262626');
	}else if($('#program-3').data('condition')==true) {
		$('#program-3').css('color', '#C23E39');

	}else{
		$('#program-3').css('color', '#262626');
	}

	$('#program').hover(
		function(){
			$('#program').css('background-color','rgba(255,0,0,0.1)');
		},
		function(){
			$('#program').css('background-color','');
		}
	);

	$('.modal-program').hover(
		function(){
			$(this).css('background-color','rgba(255,0,0,0.1)');
		},
		function(){
			$(this).css('background-color','');
		}
	);

	












});


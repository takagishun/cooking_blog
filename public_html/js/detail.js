

$(function() {

	$(".slider").slick({
		accessibility: true,
  		adaptiveHeight: true,
  		dots:  true, 
  		infinite: false,
  	    draggable: true,
  	    infinite: false,
  	    edgeFriction: 0.2,


	});


	 $('#dropdown_menu').hover(function(){
    $('.child').slideDown()},
    function(){
    $('.child').slideUp()}
    );


   $('.modal-show').click(function(){
  $('.modal-wrapper').show();
});

$('#program-modal > .modal-hide').click(function(){
  $('.modal-wrapper').hide();
});








    var $win = $(window);
    var position03 = $('.chart-xbar-01').offset().top - ($win.height() / 3 * 2);// 横軸棒グラフのy軸
    var flag = null;
    var flag02 = null;

  

  　$win.scroll(function(){
         
      if($(this).scrollTop() > position03){
         $('.chart-xbar-01').addClass('active');
          }
      });

  

    var $protein = $('#calorie').data('protein');
    var $protein_per = $protein/136 * 100;
    var $fat = $('#calorie').data('fat');
    var $fat_per = $fat/180 * 100;
    var $carb = $('#calorie').data('carb');
    var $carb_per = $carb/420 * 100;


    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ["タンパク質", "脂質", "炭水化物"],
      datasets: [{
        label: '基準値',
        backgroundColor: "rgba(153,255,51,0.4)",
        borderColor: "rgba(153,255,51,1)",
        data: [100, 100, 100],
      }, {
        label: '各料理の栄養成分量',
        backgroundColor: "rgba(255,153,0,0.4)",
        borderColor: "rgba(255,153,0,1)",
        data: [$protein_per,$fat_per,$carb_per]
      }]
    },
     options: {
      scale: {
        pointLabels: {
          fontSize: 12 //フォントサイズ
        },
        ticks: { //http://www.chartjs.org/docs/#scales-radial-linear-scale
          stepSize: 100, // 目盛の間隔
          max: 150, //最大値
          beginAtZero: true
        }
      },

        legend: {
              // display: false
           },

        tooltips: {
              // enabled: false
           }
      
    }

    });




       


  
        



});
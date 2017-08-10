


$(function() {

    $( "#tabs" ).tabs();


    if ($('#findnull1').length) {
      $('#read-more1').css('display','none');
    };

    if ($('#findnull2').length) {
      $('#read-more2').css('display','none');
    };

    if ($('#findnull3').length) {
      $('#read-more3').css('display','none');
    };




    $("#read-more1").click(function(){

      $("#content-wrapper1").fadeIn();
      $("#read-more1").hide();
      $("#read-hide1").show();

    });

    $("#read-hide1").click(function(){

      $("#content-wrapper1").fadeOut(1);
      $("#read-more1").show();
      $("#read-hide1").hide();

    });


    $("#read-more2").click(function(){

      $("#content-wrapper2").fadeIn();
      $("#read-more2").hide();
      $("#read-hide2").show();

    });

    $("#read-hide2").click(function(){

      $("#content-wrapper2").fadeOut(2);
      $("#read-more2").show();
      $("#read-hide2").hide();

    });


    $("#read-more3").click(function(){

      $("#content-wrapper3").fadeIn();
      $("#read-more3").hide();
      $("#read-hide3").show();

    });

    $(".read-hide3").click(function(){

      $(".content-wrapper3").fadeOut(3);
      $(".read-more3").show();
      $(".read-hide3").hide();

    });



    



    

// char1



    var $win = $(window);
    var position03 = $('.chart-xbar-01').offset().top - ($win.height() / 3 * 2);// 横軸棒グラフのy軸
    var flag = null;
    var flag02 = null;

  

  　　　$win.scroll(function(){
         
      if($(this).scrollTop() > position03){
         $('.chart-xbar-01').addClass('active');
          }
      });

  


// chart2

  
    var $protein1 = $('#calorie').data('protein1');
    var $protein1_per = $protein1/136 * 100;
    var $fat1 = $('#calorie').data('fat1');
    var $fat1_per = $fat1/180 * 100;
    var $carb1 = $('#calorie').data('carb1');
    var $carb1_per = $carb1/420 * 100;


    var ctx = document.getElementById("myChart1");
    var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ["タンパク質", "脂質", "炭水化物"],
      datasets: [{
        label: '基準値(%)',
        backgroundColor: "rgba(153,255,51,0.4)",
        borderColor: "rgba(153,255,51,1)",
        data: [100, 100, 100],
      }, {
        label: '各料理の栄養成分量(%)',
        backgroundColor: "rgba(255,153,0,0.4)",
        borderColor: "rgba(255,153,0,1)",
        data: [$protein1_per,$fat1_per,$carb1_per]
      }]
    },
     options: {
      scale: {
        pointLabels: {
          fontSize: 12 //フォントサイズ
        },
        ticks: { //http://www.chartjs.org/docs/#scales-radial-linear-scale
          stepSize: 100, // 目盛の間隔
          max: 200, //最大値
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


    var $protein2 = $('#calorie').data('protein2');
    var $protein2_per = $protein2/136 * 100;
    var $fat2 = $('#calorie').data('fat2');
    var $fat2_per = $fat2/180 * 100;
    var $carb2 = $('#calorie').data('carb2');
    var $carb2_per = $carb2/420 * 100;


    var ctx = document.getElementById("myChart2");
    var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ["タンパク質", "脂質", "炭水化物"],
      datasets: [{
        label: '基準値(%)',
        backgroundColor: "rgba(153,255,51,0.4)",
        borderColor: "rgba(153,255,51,1)",
        data: [100, 100, 100],
      }, {
        label: '各料理の栄養成分量(%)',
        backgroundColor: "rgba(255,153,0,0.4)",
        borderColor: "rgba(255,153,0,1)",
        data: [$protein2_per,$fat2_per,$carb2_per]
      }]
    },
     options: {
      scale: {
        pointLabels: {
          fontSize: 12 //フォントサイズ
        },
        ticks: { //http://www.chartjs.org/docs/#scales-radial-linear-scale
          stepSize: 100, // 目盛の間隔
          max: 200, //最大値
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


    var $protein3 = $('#calorie').data('protein3');
    var $protein3_per = $protein3/136 * 100;
    var $fat3 = $('#calorie').data('fat3');
    var $fat3_per = $fat3/180 * 100;
    var $carb3 = $('#calorie').data('carb3');
    var $carb3_per = $carb3/420 * 100;


    var ctx = document.getElementById("myChart3");
    var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ["タンパク質", "脂質", "炭水化物"],
      datasets: [{
        label: '基準値(%)',
        backgroundColor: "rgba(153,255,51,0.4)",
        borderColor: "rgba(153,255,51,1)",
        data: [100, 100, 100],
      }, {
        label: '各料理の栄養成分量(%)',
        backgroundColor: "rgba(255,153,0,0.4)",
        borderColor: "rgba(255,153,0,1)",
        data: [$protein3_per,$fat3_per,$carb3_per]
      }]
    },
     options: {
      scale: {
        pointLabels: {
          fontSize: 12 //フォントサイズ
        },
        ticks: { //http://www.chartjs.org/docs/#scales-radial-linear-scale
          stepSize: 100, // 目盛の間隔
          max: 200, //最大値
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
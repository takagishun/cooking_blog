

$(document).ready(function(){ 
$("#search_results").slideUp(); 
    $("#search_button").click(function(e){ 
        e.preventDefault(); 
        ajax_search(); 
    }); 
    $("#search_term").keyup(function(e){ 
        e.preventDefault(); 
        ajax_search(); 
    }); 






  $(document).on('click', '#button', function(){
     var food_name =  $(this).data('name'); 
     var unit = $(this).data('unit'); 
     var boxaddemail = $(this).data('boxaddemail');
    //  if($("#boxadd_results").hasClass("done")){
    // 　 $("#boxadd_results").append("<input type='hidden' id='food_name' name='food_name[]' value="+food_name+" /><input type='hidden' id='unit' name='unit[]' value="+unit+" /><label id="+food_name+">"+food_name+"</label><input name='quantity[]' id='quantity' placeholder='数量を記入してください'><span>"+unit+"</span></br>");
    //  }else{
    // 　$("#boxadd_results").append("<input type='hidden' name='food_name[]' value="+food_name+" /><input type='hidden' name='unit[]' value="+unit+" /><label id="+food_name+">"+food_name+"</label><input name='quantity[]' placeholder='数量を記入してください'><span>"+unit+"</span></br>");
    //   $("#box_submit").append("<button id='submit'>冷蔵庫に登録</button>")
    //   $("#boxadd_results").addClass("done");

    
    


      $("#boxadd_results").append(
        "<form>"+
        "<table><tbody><tr><td><input type='hidden' class="+food_name+" name='box_email' value="+boxaddemail+" /></td>"+
        "<td><input type='hidden' class="+food_name+" name='food_name' value="+food_name+" /></td>"+
        "<td><input type='hidden' class="+food_name+" name='unit' value="+unit+" /></td>"+
        "<td><label class="+food_name+">"+food_name+" :</label><input name='quantity' class="+food_name+" placeholder='数量を記入してください'><span>"+unit+"</span></td>"+
        "<td><select name='year' class="+food_name+"><option value='0'>----</option></select>年"+
        "<select name='month' class="+food_name+"><option value='0'>--</option></select>月"+
        "<select name='day' class="+food_name+"><option value='0'>--</option></select>日​</td>"+
        "<td><button class='box_add_btn' id="+food_name+">冷蔵庫に登録</button></td></tr></tbody></table>"+
        "</form></br>");

      var time = new Date();
      var year = time.getFullYear();
      for (var i = year; i <= 2020; i++) {
      $('select.'+food_name+'[name=year]').append('<option value="' + i + '">' + i + '</option>');
      }
      //1～12の数字を生成
      for (var i = 1; i <= 12; i++) {
      $('select.'+food_name+'[name=month]').append('<option value="' + i + '">' + i + '</option>');
      }
      //1～31の数字を生成
      for (var i = 1; i <= 31; i++) {
      $('select.'+food_name+'[name=day]').append('<option value="' + i + '">' + i + '</option>');
      }
        
  


  $("#"+food_name).click(function(){     //変換ボタンをクリックで発生


         
    



          $.ajax({ //ajaxによる非同期通信発生
               type: "POST", //POST送信でデータを受け渡す
               url: "boxupadd.php", //send.phpにデータを送る
               data: {'box_email':$("."+food_name+"[name=box_email]").val(),
                      'food_name':$("."+food_name+"[name=food_name]").val(),
                      'quantity':$("."+food_name+"[name=quantity]").val(),
                      'unit':$("."+food_name+"[name=unit]").val(),
                      'year':$("."+food_name+"[name=year]").val(),
                      'month':$("."+food_name+"[name=month]").val(),
                      'day':$("."+food_name+"[name=day]").val()
                      }, //id:seirekiに入力された文字列         
               success: function() //接続が成功
                    {

                          var box_food_name = $("."+food_name+"[name=food_name]").val();
                          var box_quantity = $("."+food_name+"[name=quantity]").val();
                          var box_unit = $("."+food_name+"[name=unit]").val();
                          var box_year = $("."+food_name+"[name=year]").val();
                          var box_month = $("."+food_name+"[name=month]").val();
                          var box_day = $("."+food_name+"[name=day]").val();


                          var h = '<tr><td class="food_name">'
                                  +box_food_name
                                  +'</td><td class="quantity">'
                                  +box_quantity
                                  +'</td><td class="unit">'
                                  +box_unit
                                  +'</td><td class="open_date">'
                                  +box_year
                                  +'年'
                                  +box_month
                                  +'月'
                                  +box_day
                                  +'日'
                                  +'</td><td class="memo" style="color:red;">'
                                  +'追加しました!!'
                                  +'</td>'
                                  +'<td class="box_delete"></td></tr>'

                    

                          $("#box_item").prepend(h)
                          $(".new").fadeOut(3000);
                         // alert('ok'); //send.phpからの帰り値をポップアップで表示
                    },         
               error: function(XMLHttpRequest,textStatus,errorThrown) //接続が失敗
                    {
                         alert('エラーです！'); //エラーを表示
                    }
          });
          return false;    
     




     });

});




$(".box_edit").click(function(){
  $(".box_delete").show();


});

$('.box_reload').click(function() {
  location.reload();
});



});




function ajaxBoxFunc(param){

  $.post("deletebox.php",
          {id:param},
          function(){
            $(".id_"+param).html("<p style='color:red;'>削除しました</p>");
            $(".id_"+param).fadeOut(2000);
          });
 }

function ajax_search(){ 
  $("#search_results").show(); 
  var search_val=$("#search_term").val(); 
  $.post("boxup.php", {search_term : search_val}, function(data){
   if (data.length>0){ 
     $("#search_results").html(data); 
   }})
 }


 




 



  




 
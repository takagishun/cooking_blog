$(function(){

//現在の年数オブジェクトを4桁で生成
var time = new Date();
var year = time.getFullYear();
//1900年まで表示
for (var i = year; i >= 1900; i--) {
  createOptionElements(i,'year');
}
//1～12の数字を生成
for (var i = 1; i <= 12; i++) {
  createOptionElements(i,'month');
}
//1～31の数字を生成
for (var i = 1; i <= 31; i++) {
  createOptionElements(i,'day');
}

function createOptionElements(num,parentId){
    var doc = document.createElement('option');
    doc.value = doc.innerHTML = num;
    document.getElementById(parentId).appendChild(doc);
}

})
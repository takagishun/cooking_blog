<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Box();

$app->run();

// $app->me()
// $app->getValues()->users
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/about/head.php');?>
  <title>takagi kitchen</title>
  <link rel="stylesheet" type="text/css" href="css/box.css">
  <script src="http://192.168.33.10:8000/js/box.js" id="boxaddemail" data-boxaddemail="<?= h($app->me()->email) ?>"></script>
  
</head>
<body> 
<?php require_once(__DIR__ . '/about/header.php');?>
<div class="container">

<div id="breadcrumb">
    <ul class="breadcrumb-inner">
      <li>
        <a href="http://192.168.33.10:8000/index.php">
          <span>TOP</span>
        </a>
      </li>
      <span>></span>
      <li>
          <span>MYBOX</span>
      </li>
    </ul>
</div>

<article class="box_content">

<div class="content_inner">
<div class="add_inner">
<form id="searchform" method="post"> 
<div> 
        <p><input type="text" name="search_term" id="search_term" placeholder="冷蔵庫にある食材を入力してください" ><p>
        <!-- <p><input type="submit" value="食材を検索" id="search_button" ></p>  -->
</div> 
</form> 
    <div id="search_results"></div> 
    <div id="boxadd_results"></div> 
</div>
<div class="box_inner">
  <div class="contentHedder">
  <h2>MYBOX</h2>
  <ul class="unity">
    <li class="box_edit">編集</li>
    <li class="box_reload"><i class="fa fa-repeat" aria-hidden="true"></i></li>
  </ul>
  </div>
  <table>
  <thead>
    <tr><th class="food_name">材料名</th><th class="quantity">内容量</th><th class="unit"></th><th class="open_date">賞味期限</th><th class="new"></th></tr>
  </thead>
  <tbody id="box_item">
    <?php foreach($app->getValues()->boxitem as $item): ?>
    <tr class="id_<?=h($item->id)?>" style='<?php if(h($item->open_date)<=date("Y年n月j日",strtotime( "+5 day" )) && h($item->open_date)>=date("Y年n月j日",strtotime( "+4 day" ))){echo "color:red;" ;}elseif(h($item->open_date) < date("Y年n月j日",strtotime( "+4 day" ))){ echo "color:blue;" ;}else{} ?>'>
    <td class="food_name"><?= h($item->food_name) ?></td><td class="quantity"><?= h($item->quantity) ?></td><td class="unit"><?= h($item->unit)?></td>
    <td class="open_date"><?php if(h($item->open_date)<=date('Y年n月j日',strtotime( "+5 day" )) && h($item->open_date)>=date('Y年n月j日',strtotime( "+4 day" ))){echo h($item->open_date);}elseif(h($item->open_date) < date('Y年n月j日',strtotime( "+4 day" ))){ echo h($item->open_date);}else{echo h($item->open_date);}?></td>
    <td class="memo"><?php if(h($item->open_date)<=date('Y年n月j日',strtotime( "+5 day" )) && h($item->open_date)>=date('Y年n月j日',strtotime( "+4 day" ))){echo '<font color="red">賞味期限が迫っています</font>';}elseif(h($item->open_date) < date('Y年n月j日',strtotime( "+4 day" ))){ echo '<font color="blue">賞味期限が切れてます</font>';}else{}?></td>
    <td><button data-id="id_<?=h($item->id) ?>" class="box_delete" onClick="ajaxBoxFunc('<?= h($item->id); ?>')">削除</button></td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>
</div>
</div>
</article>
</div>


<?php require_once(__DIR__ . '/about/footer.php');?>


</body> 
</html>



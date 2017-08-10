<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\FavoList();

$app->run();

// $app->me()
// $app->getValues()->users

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/about/head.php');?>
  <title>takagi kitchen</title>
  <link rel="stylesheet" type="text/css" href="http://192.168.33.10:8000/css/index.css">
  <link rel="stylesheet" type="text/css" href="http://192.168.33.10:8000/css/favoritelist.css">
  <script src="http://192.168.33.10:8000/js/index.js"></script>
</head>
<body>
   <?php require_once(__DIR__ . '/about/header.php');?>
   <div id="breadcrumb">
    <ul class="breadcrumb-inner">
      <li>
        <a href="http://192.168.33.10:8000/index.php">
          <span>TOP</span>
        </a>
      </li>
      <span>></span>
      <li>
          <span>お気に入りレシピ</span>
      </li>
    </ul>
    </div>
    <div class="container">
     <?php if($app->getValues()->FavoList==null){echo "<p class='findnull'>お気に入り登録されたレシピがありません</p>";} ?></p>
      <div class="colum">
        <div class="column-box-wrapper">
          <?php foreach($app->getValues()->FavoList as $menu): ?>
          <div class="column-box">
            <a href="http://192.168.33.10:8000/detail.php?category_name=<?= h($menu->category_name);?>&amp;detail_category_name=<?= h($menu->detail_category_name)?>&amp;menu_name=<?= h($menu->menu_name); ?>">
              <div class="column-image" style="background-image: url('images/<?php echo h($menu->menu_image);?>')">
                <h2><?php echo h($menu->menu_name); ?></h2>
                <div class="zoom-black">
                  <h2><?php echo h($menu->menu_name); ?></h2>
                </div>
              </div>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="clear"></div>
    </div>
    </div>
   <?php require_once(__DIR__ . '/about/footer.php');?>
</body>
</html>

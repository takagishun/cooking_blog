<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Category();

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
          <span><?php echo h($_GET['category_name']); ?></span>
      </li>
    </ul>
    </div>
    <div class="container">
        <div class="category_wrapper">
          <h2 class-"category_name"><?= h($_GET['category_name']) ?></h2>
          <ul>
            <?php foreach($app->getValues()->DetailCategory as $list): ?>
             <li><a href="http://192.168.33.10:8000/detailCategory.php?category_name=<?php echo h($_GET['category_name']);?>&amp;detail_category_name=<?php echo h($list->detail_category_name);?>"><?= h($list->detail_category_name) ?><span>></span></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="column-box-wrapper">
           <div class="filters-wrapper">
              <div id="all" class="filter-item active">ALL</div>
              <div id="100" class="filter-item">¥100</div>
              <div id="200" class="filter-item">¥200</div>
              <div id="300" class="filter-item">¥300</div>
              <div id="400" class="filter-item">¥400</div>
              <div id="500" class="filter-item">¥500</div>
           </div>
          <?php foreach($app->getValues()->Category_menus as $menu): ?>
          <div class="column-box <?php echo round(h($menu->menu_costs),-2);?>">
            <a href="http://192.168.33.10:8000/detail.php?category_name=<?php echo h($menu->category_name);?>&amp;detail_category_name=<?php echo h($menu->detail_category_name);?>&amp;menu_name=<?php echo h($menu->menu_name);?>">
              <div class="column-image" style="background-image: url('images/<?php echo h($menu->menu_image);?>')">
                <div class="zoom-black">
                  <h2><?php echo h($menu->menu_name); ?></h2>
                </div>
                <h2><?php echo h($menu->menu_name); ?></h2>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
        </div>
        <div class="clear"></div>
    </div>
   <?php require_once(__DIR__ . '/about/footer.php');?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://192.168.33.10:8000/js/index.js"></script>
</body>
</html>

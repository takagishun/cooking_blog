<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Refrigerator();

$app->run();

// $app->me()
// $app->getValues()->users

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/about/head.php');?>
	<title><?php echo h($_GET['menu_name']); ?></title>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//192.168.33.10:8000/css/detail.css">
	<script src="//192.168.33.10:8000/js/detail.js"></script>
    <script src="//192.168.33.10:8000/js/favo.js"></script>
    <script src="//192.168.33.10:8000/js/program.js"></script>

</head>
<body>
   <?php require_once(__DIR__ . '/about/header.php');?>
   <div>
	<form>
		<input>
		<input>
		<input>
		<input>
	</form>
   </div>
   <?php require_once(__DIR__ . '/about/footer.php');?>
</body>
</html>
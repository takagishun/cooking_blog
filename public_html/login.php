<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Login();

$app->run();

// echo "login screen";
// exit;

?>
<!DOCTYPE html>

<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/about/head.php');?>
  <title>takagi kitchen</title>
  <link rel="stylesheet" type="text/css" href="http://192.168.33.10:8000/css/login.css">
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
          <span>ログイン</span>
      </li>
    </ul>
    </div>
  <div class="container">
    <form class="login_form" action="" method="post" id="login">
      <p>
        <input class="login" type="text" name="email" placeholder="メールアドレスを入力してください" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>">
      </p>
      <p>
        <input class="login" type="password" name="password" placeholder="パスワードを入力してください">
      </p>
      <p class="err"><?= h($app->getErrors('login')); ?></p>
      <div class="btn" onclick="document.getElementById('login').submit();">ログイン</div>
      <p class="fs12"><a href="/signup.php">新規登録</a></p>
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
  </div>
  <?php require_once(__DIR__ . '/about/footer.php');?>
</body>
</html>
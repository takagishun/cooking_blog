<?php

// 新規登録

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Signup();

$app->run();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/about/head.php');?>
  <link rel="stylesheet" type="text/css" href="http://192.168.33.10:8000/css/signup.css">
  <script src="http://192.168.33.10:8000/js/signup.js"></script>
  <title>新規登録</title>
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
          <span>新規登録</span>
      </li>
    </ul>
  </div>
  <div class="container">
    <article>
      <div id="contentHeader">
      <h1>新規会員登録</h1>
      </div>
      <section id="registContainer" class="section registForm">
        <div class="sectionInner">
          <div class="sectionHeader">
            <h2>基本情報</h2>
          </div>
        <div class="contBody">
    <form class="signup_form" action="" method="post" id="signup">
      <table>
      <tbody>
      <tr id="secSexType">
      <th>性別
      <span class="str">*必須</span></th>
      <td class="sexYtpeForm">
      <label>
      <span rel="SexID" class="radio">
      <input type="radio" name="SexID" id="SexID1" value="1" value="<?= isset($app->getValues()->sexid) ? h($app->getValues()->sexid) : ''; ?>">
      </span>
      男性
      </label>
      <label>
      <span rel="SexID" class="radio checked">
      <input type="radio" name="SexID" id="SexID2" value="2" checked value="<?= isset($app->getValues()->sexid) ? h($app->getValues()->sexid) : ''; ?>">
      </span>
      女性
      </label>
      </td>
      </tr>
      <tr id="secBirthType">
      <th>生年月日
      <span class="str">*必須</span>
      </th>
      <td class="birthform birth">
      <select name="Birth_Year">
        <option value="<?= isset($app->getValues()->year) ? h($app->getValues()->year) : ''; ?>"><?= isset($app->getValues()->year) ? h($app->getValues()->year) : ''; ?></option>
        <?php foreach(range(1920,2016) as $year): ?>
        <option value="<?=$year?>"><?=$year?></option>
        <?php endforeach; ?>
      </select><span>年</span> 
      <select name="Birth_Month">
        <option  value="<?= isset($app->getValues()->month) ? h($app->getValues()->month) : ''; ?>"><?= isset($app->getValues()->month) ? h($app->getValues()->month) : ''; ?></option>
        <?php foreach(range(1,12) as $month): ?>
        <option value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
        <?php endforeach; ?>
      </select><span>月</span>
      <select name="Birth_Day">
        <option  value="<?= isset($app->getValues()->day) ? h($app->getValues()->day) : ''; ?>"><?= isset($app->getValues()->day) ? h($app->getValues()->day) : ''; ?></option>
        <?php foreach(range(1,31) as $day): ?>
        <option value="<?=str_pad($day,2,0,STR_PAD_LEFT)?>"><?=$day?></option>
        <?php endforeach; ?>
      </select><span>日</span>
      <p class="err"><?= h($app->getErrors('birth')); ?></p>
      </td>
      </tr>
      <tr id="secZipCode">
        <th>郵便番号
        <span class="str">*必須</span>
        </th>
        <td class="postForm">
          <input type="text" name="Address" size="10" maxlength="7" placeholder="例 : 2617116" value="<?= isset($app->getValues()->address) ? h($app->getValues()->address) : ''; ?>">
          <p class="note">※ 数字7ケタ、ハイフン無し</p>
          <p class="err"><?= h($app->getErrors('address')); ?></p>
        </td>
      </tr>
      <tr id="secMailAdd">
        <th>メールアドレス<br><span class="str">*必須</span>
        </th>
        <td class="mailForm">
          <div class="main clearfix">
            <input type="text" name="Email" class="adsress" placeholder="例 : takagishun@takagishun.jp" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>">
            <p class="note">※ メールアドレスがIDとなります</p>
            <p class="err"><?= h($app->getErrors('email')); ?></p>
          </div>
          <div class="sub">
            <input type="text" name="EmailConf" value class="email" placeholder="確認のため再度入力してください">
            <p class="err"><?= h($app->getErrors('emailconf')); ?></p>
          </div>
        </td>
      </tr>
      <tr id="secPassword">
        <th>パスワード<br><span class="str">*必須</span>
        </th>
        <td class="passForm">
          <div class="main clearfix">
            <input type="password" id="login_password1" name="Password" value size="16" maxlegth="12" placeholder="例 : TAKAGIshun0910">
            <p class="note">※ IDに含まれない英数字混合 8～12 文字</p>
            <p class="err"><?= h($app->getErrors('password')); ?></p>
          </div>
          <div class="sub">
            <input type="password" name="PasswordConf" value size="16" maxlegth="12" placeholder="確認のため再度入力してください">
            <p class="err"><?= h($app->getErrors('passwordconf')); ?></p>
          </div>
        </td>
      </tr>
      </tbody>
      </table>
      <div class="confTxt">
      <p id="registAgree">
      <label>
      <span>
      <input type="checkbox" name="chkAgree" value="1">
      </span>
      <a class="ico_pop popup" href="">利用規約</a>
      ,
      <a class="ico_pop popup" href="">個人情報保護方針</a>
      に同意する
      </label>
      </p>
      <p class="err"><?= h($app->getErrors('agree')); ?></p>
      </div>
      <p class="btn">
      <div  value="会員登録する" name="Regist" class="gBtn" onclick="document.getElementById('signup').submit();">会員登録する</div>
      </p>
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
    </div>
    </div>
    </section>
    <div id="note" class="">
      <p>※ 「会員登録する」を選択したことで、利用規約に同意されたものといたします。</p>
    </div>
    </article>
  
  </div>
  <?php require_once(__DIR__ . '/about/footer.php');?>
</body>
</html>
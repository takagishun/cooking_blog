<header>
  <div id="header_wrapper">
		<h1 class="logo"><a href="http://192.168.33.10:8000/index.php">Shun Kitchen</a></h1>
		<form class="search-form" action="searchform.php" method="get">
		<input class="search-text" type="text" name="search" placeholder="料理名・食材でレシピを検索">
		<input class="search-btn" type="submit" id="searchsubmit" value="&#xf002;" >
		</form>
    <div class="program">
      <h2><i class="fa  fa-cutlery" aria-hidden="true"></i></h2>
      <ul class="program_modal">
      <li><a href="//192.168.33.10:8000/programlist.php">MY MENU</a></li>
      <li><a href="//192.168.33.10:8000/box.php">MY BOX</a></li>
      </ul>
      <p class="loggedin_program_modal"><a href="//192.168.33.10:8000/programlist.php">ログインすると『献立』機能が使えます</a></p>
    </div>
		<div class="favor">
      <h2><i class="fa fa-heart" aria-hidden="true"></i></h2>
      <p class="favor_modal"><a href="//192.168.33.10:8000/favoritelist.php">お気に入りしたレシピ</a></p>
      <p class="loggedin_favor_modal"><a href="//192.168.33.10:8000/favoritelist.php">ログインするとお気に入り機能が使えます</a></p>
    </div>
		<div class="mypage_menu">
          <?php if ($app->me()===null) {
             echo "<a class='header_login' href='http://192.168.33.10:8000/login.php'>ログイン</a>";
          }else{$strpos=strpos(h($app->me()->email),'@'); $loginuser=substr(h($app->me()->email),0,$strpos); echo "<p>$loginuser 様</p>";} ?>
            <ul class="modal">
              <li><a href="">マイページ</a></li>
              <li>
                <form class="logout"  action="logout.php" method="post" id="logout">
                  <input class="logout" type="submit" value="ログアウト">
                  <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
                </form>
              </li>
            </ul>
        </div>
    <div class="clear"></div>
  </div>
</header>
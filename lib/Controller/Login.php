<?php

namespace MyApp\Controller;

class Login extends \MyApp\Controller {
// ログインされているか？
  public function run() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }

    // フォームが送信された時postPrecessメソッド
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }
  }// 以下postProcessメソッド
  protected function postProcess() {
    try {
      // _validateメソッドでエラー判定
      $this->_validate();
      //_validateメソッドで投げられた例外処理。Emptypostクラスの$eに例外内容を代入
    } catch (\MyApp\Exception\EmptyPost $e) {
      $this->setErrors('login', $e->getMessage());
    }
      // エラーがなかったらsetValuesにpostされたemailをセットする。
    $this->setValues('email', $_POST['email']);

      // エラーを持っているか判定
    if ($this->hasError()) {
      // 持っていたら処理中断して返す
      return;
    } else {
      // 持っていなかったら以下の処理実行
      try {
        $userModel = new \MyApp\Model\User();
        $user = $userModel->login([
          'email' => $_POST['email'],
          'password' => $_POST['password']
        ]);
        // 例外：パスワードとemailがマッチしない
      } catch (\MyApp\Exception\UnmatchEmailOrPassword $e) {
        $this->setErrors('login', $e->getMessage());

        return;
      }

      // login処理
      session_regenerate_id(true);
      $_SESSION['me'] = $user;
      $strpos = strpos($_SESSION['me'],'@');
      $loginuser = substr($_SESSION['me'],0,$strpos);


      // redirect to home
      header('Location: ' . SITE_URL);
      exit;
    }
  }

  private function _validate() {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
      echo "Invalid Token!";
      exit;
    }
    // 検索エンジンクローラーなどから（機械的な処理）によって直接アクセスされた場合の処理
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
      echo "Invalid Form!";
      exit;
    }

    // 
    if ($_POST['email'] === '' || $_POST['password'] === '') {
      // EmptyPostクラスの例外を上のcatch部分に投げてあげる
      throw new \MyApp\Exception\EmptyPost();
    }
  }

}
<?php

namespace MyApp\Controller;

class Signup extends \MyApp\Controller {
// もしログイン済みだった場合undex.phpに移行
  public function run() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }
    // ログインしていなった場合
    // formに投稿された場合
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }
  }

    // フォームの投稿があった時の流れ
  protected function postProcess() {
    // validate

  



    try {
      // Signupクラスの_valodateメソッドを呼ぶ
      $this->_validate();
  
      // メールアドレスが違った場合のexceptionの子クラスのInvalidedemailクラスのインスタンスを$eで受け取っている
      // getメッセージメソッドはphpで定義済みのメソッド

    }catch (\MyApp\Exception\InvalidBirth $e) {
      // Addressのキーで,メッセージを渡す
    $this->setErrors('birth', $e->getMessage());
    
    }catch (\MyApp\Exception\InvalidAddress $e) {
        // Addressのキーで,メッセージを渡す
      $this->setErrors('address', $e->getMessage());
      // パスワードも同様
    }catch (\MyApp\Exception\InvalidEmail $e) {
        // emailのキーで,メッセージを渡す
      $this->setErrors('email', $e->getMessage());
      // パスワードも同様
    }catch (\MyApp\Exception\InvalidEmailConf $e) {
        // emailのキーで,メッセージを渡す
      $this->setErrors('emailconf', $e->getMessage());
      // パスワードも同様
    }catch (\MyApp\Exception\InvalidPassword $e) {
      $this->setErrors('password', $e->getMessage());
   
    }catch (\MyApp\Exception\InvalidPasswordConf $e) {
      $this->setErrors('passwordconf', $e->getMessage());
   
    }catch (\MyApp\Exception\InvalidAgree $e) {
      $this->setErrors('agree', $e->getMessage());
   
    }

    $this->setValues('sexid', $_POST['SexID']);
    $this->setValues('year', $_POST['Birth_Year']);
    $this->setValues('month', $_POST['Birth_Month']);
    $this->setValues('day', $_POST['Birth_Day']);
    $this->setValues('address', $_POST['Address']);
    $this->setValues('email', $_POST['Email']);
  
    
    // この時点でエラーを持っていないか
    if ($this->hasError()) {
      return;
    } else {
      // create user
      try {
        $userModel = new \MyApp\Model\User();
        $userModel->create([
          'sexid' => $_POST['SexID'],
          'birth' => $_POST['Birth_Year']."-".$_POST['Birth_Month']."-".$_POST['Birth_Day'],
          'address' => $_POST['Address'],
          'email' => $_POST['Email'],
          'password' => $_POST['Password']
        ]);
      //メールアドレスが重複していないか 
      } catch (\MyApp\Exception\DuplicateEmail $e) {
        $this->setErrors('email', $e->getMessage());
        return;
      }

      // redirect to login
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }
  }

  private function _validate() {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
      echo "Invalid Token!";
      exit;
    }
    if (empty($_POST['Birth_Year']) || empty($_POST['Birth_Month']) || empty($_POST['Birth_Day'])) {
      // trueだった場合ExceptionクラスのInvalidEmailクラスのインスタンスに投げる
      throw new \MyApp\Exception\InvalidBirth();
    }

    if (!preg_match('/^\d{7}$/',$_POST['Address'])) {
      // trueだった場合ExceptionクラスのInvalidEmailクラスのインスタンスに投げる
      throw new \MyApp\Exception\InvalidAddress();
    }

    // メールアドレスの検証。　
    if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
      // trueだった場合ExceptionクラスのInvalidEmailクラスのインスタンスに投げる
      throw new \MyApp\Exception\InvalidEmail();
    }

    if ($_POST['Email'] != $_POST['EmailConf']) {
      // trueだった場合ExceptionクラスのInvalidEmailクラスのインスタンスに投げる
      throw new \MyApp\Exception\InvalidEmailConf();
    }
    // パスワードの検証
    if (!preg_match('/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,13}+\z/', $_POST['Password'])) {
      // trueだった場合ExceptionクラスのInvalidpasswordクラスのインスタンスを投げる
      throw new \MyApp\Exception\InvalidPassword();
    }

    if ($_POST['Password'] != $_POST['PasswordConf']) {
      // trueだった場合ExceptionクラスのInvalidpasswordクラスのインスタンスを投げる
      throw new \MyApp\Exception\InvalidPasswordConf();
    }
    // 郵便番号の検証
    if (empty($_POST['chkAgree'])) {
      // trueだった場合ExceptionクラスのInvalidEmailクラスのインスタンスに投げる
      throw new \MyApp\Exception\InvalidAgree();
    }
    
  }

}
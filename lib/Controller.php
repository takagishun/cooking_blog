<?php

namespace MyApp;

class Controller {

  private $_errors;
  private $_values;

  public function __construct() {
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
    $this->_errors = new \stdClass();
    $this->_values = new \stdClass();
  }
 
  // set(指定したkey,value)
  protected function setValues($key, $value) {
    // 指定したkeyにvalueをセット、今回の場合はpostされたメールアドレス
    $this->_values->$key = $value;
  }

    // セットされたvalueを引き出す。
  public function getValues() {
    return $this->_values;
  }

    // このクラスの_erroesプロパティーのkeyにメッセージを代入
  protected function setErrors($key, $error) {
    $this->_errors->$key = $error;
  }

  public function getErrors($key) {
    return isset($this->_errors->$key) ?  $this->_errors->$key : '';
  }


  // エラーを保持しているか？
  protected function hasError() {
    //get_object_vars _errorsプロパティーに値がsetされいるか、いない場合はnullwp返す
    return !empty(get_object_vars($this->_errors));
  }

  // ログインしているか
  protected function isLoggedIn() {
    // $_SESSION['me']
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }

  // 
  public function me() {
    return $this->isLoggedIn() ? $_SESSION['me'] : null;
  }
}
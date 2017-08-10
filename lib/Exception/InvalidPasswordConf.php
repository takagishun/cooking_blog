<?php

namespace MyApp\Exception;

class InvalidPasswordConf extends \Exception {
  protected $message = 'パスワードが一致しません';
}
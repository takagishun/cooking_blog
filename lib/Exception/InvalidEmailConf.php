<?php

namespace MyApp\Exception;

class InvalidEmailConf extends \Exception {
  protected $message = 'メールアドレスが一致しません';
}
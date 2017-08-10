<?php

namespace MyApp\Exception;

class InvalidAgree extends \Exception {
  protected $message = '利用規約、個人情報保護方針に同意するにチェックが入っていません';
}
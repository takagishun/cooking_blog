<?php

namespace MyApp\Exception;

class InvalidPassword extends \Exception {
  protected $message = '半角英小文字大文字数字を含めた８文字以上１２文字以下で記入してください';
}
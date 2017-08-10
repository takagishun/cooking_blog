<?php

namespace MyApp\Exception;

class InvalidAddress extends \Exception {
  protected $message = '郵便番号を入力してください';
}
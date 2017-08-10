<?php

namespace MyApp\Exception;

class InvalidBirth extends \Exception {
  protected $message = '生年月日を選択してください';
}
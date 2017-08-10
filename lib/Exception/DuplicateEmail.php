<?php

namespace MyApp\Exception;

class DuplicateEmail extends \Exception {
  protected $message = 'このメールアドレスはご利用できません';
}
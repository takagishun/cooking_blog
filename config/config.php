<?php


// ディスプレイにエラー表示
ini_set('display_errors', 1);



// mysqqlをPDOで接続するための設定
define('DSN', 'mysql:host=localhost;dbname=cooking_blog');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '20020324');

// サイトurlの先頭部分を定義。HTTP_HOSTでIPアドレスとポート番号をセット
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();

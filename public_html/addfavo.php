<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\AddFavo();

$app->run();

// echo "login screen";
// exit;

?>
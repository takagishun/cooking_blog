<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\AddProgram();

$app->run();

// echo "login screen";
// exit;

?>
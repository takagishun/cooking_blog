<?php

namespace MyApp\Controller;
class Box extends \MyApp\Controller {

public function run(){

if (!$this->isLoggedIn()) {
      // login
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }

$boxmodel=new \MyApp\Model\Box();
$email=$this->me()->email;
$this->setValues('boxitem',$boxmodel->boxitemfind($email));

}
}





?>
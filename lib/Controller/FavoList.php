<?php

namespace MyApp\Controller;

class FavoList extends \MyApp\Controller {

  public function run() {
   	if (!$this->isLoggedIn()) {
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }

   	
    $favoModel = new \MyApp\Model\Favo();
    $email = $this->me()->email;
    $this->setValues('FavoList', $favoModel->favoListFind($email));
  }

}
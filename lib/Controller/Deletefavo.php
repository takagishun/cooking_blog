<?php

namespace MyApp\Controller;
class DeleteFavo extends \MyApp\Controller {

public function run(){

	$favoModel = new \MyApp\Model\Favo();
        $favoModel->delete([
          'email' => $_POST['email'],
          'favo_menu_name' => $_POST['favo_menu_name']
        ]);


  }
}





?>
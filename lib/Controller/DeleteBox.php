<?php

namespace MyApp\Controller;
class DeleteBox extends \MyApp\Controller {

public function run(){

	$boxModel = new \MyApp\Model\Box();
        $boxModel->delete([
          'id' => $_POST['id'],
        ]);


  }
}





?>
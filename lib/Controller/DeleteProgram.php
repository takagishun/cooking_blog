<?php

namespace MyApp\Controller;
class DeleteProgram extends \MyApp\Controller {

public function run(){

	$programModel = new \MyApp\Model\Program();
        $programModel->delete([
          'email' => $_POST['email'],
          'program_menu_name' => $_POST['program_menu_name'],
          'program_number' => $_POST['program_number']
        ]);


  }
}





?>
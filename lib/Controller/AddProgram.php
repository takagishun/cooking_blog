<?php

namespace MyApp\Controller;

class AddProgram extends \MyApp\Controller {


	public function run(){

		try{
			$ProgramModel = new \MyApp\Model\Program();
        	$ProgramModel->create([
        	  'email' => $_POST['email'],
        	  'program_menu_name' => $_POST['program_menu_name'],
              'program_number' => $_POST['program_number']
        	  ]);
        	}catch (\MyApp\Exception\EmptyProgramPost $e){
        		$this->setErrors('program', $e->getMessage());
        	}

  
  	}
}







?>
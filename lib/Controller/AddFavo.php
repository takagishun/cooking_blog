<?php

namespace MyApp\Controller;

class AddFavo extends \MyApp\Controller {


	public function run(){

		try{
			$favoModel = new \MyApp\Model\Favo();
        	$favoModel->create([
        	  'email' => $_POST['email'],
        	  'favo_menu_name' => $_POST['favo_menu_name']
        	  ]);
        	}catch (\MyApp\Exception\EmptyFavoPost $e){
        		$this->setErrors('favo', $e->getMessage());
        	}

  
  	}
}







?>
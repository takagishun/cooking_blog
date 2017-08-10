<?php

namespace MyApp\Controller;

class ProgramList extends \MyApp\Controller {

  public function run() {
  	 if (!$this->isLoggedIn()) {
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }
   	
    $programModel = new \MyApp\Model\Program();
    $email = $this->me()->email;
    $program1 = 1;
    $program2 = 2;
    $program3 = 3;
    $this->setValues('Program_1_List', $programModel->program1MenusFind($email,$program1));
    $this->setValues('Program_2_List', $programModel->program2MenusFind($email,$program2));
    $this->setValues('Program_3_List', $programModel->program3MenusFind($email,$program3));
    
    $this->setValues('Program_1_Ingredients', $programModel->program1IngredientsFind($email,$program1));
    $this->setValues('Program_2_Ingredients', $programModel->program2IngredientsFind($email,$program2));
    $this->setValues('Program_3_Ingredients', $programModel->program3IngredientsFind($email,$program3));
    
    $this->setValues('totalcalorie_1', $programModel->caloriefind1($email,$program1));
    $total_calorie1 = 0;
    $total_protein1 = 0;
    $total_fat1 = 0;
    $total_carb1 = 0;

    foreach($this->getValues()->totalcalorie_1 as $list) {
        $total_calorie1 += $list->calorie;
        $total_protein1 += $list->protein;
        $total_fat1 += $list->fat;
        $total_carb1 += $list->carb;
    }
    $this->setValues('calorie1', $total_calorie1);
    $this->setValues('protein1', $total_protein1);
    $this->setValues('fat1', $total_fat1 );
    $this->setValues('carb1', $total_carb1);


    $this->setValues('totalcalorie_2', $programModel->caloriefind2($email,$program2));
    $total_calorie2 = 0;
    $total_protein2 = 0;
    $total_fat2 = 0;
    $total_carb2 = 0;

    foreach($this->getValues()->totalcalorie_2 as $list) {
        $total_calorie2 += $list->calorie;
        $total_protein2 += $list->protein;
        $total_fat2 += $list->fat;
        $total_carb2 += $list->carb;
    }
    $this->setValues('calorie2', $total_calorie2);
    $this->setValues('protein2', $total_protein2);
    $this->setValues('fat2', $total_fat2 );
    $this->setValues('carb2', $total_carb2);

    $this->setValues('totalcalorie_3', $programModel->caloriefind3($email,$program3));
    $total_calorie3 = 0;
    $total_protein3 = 0;
    $total_fat3 = 0;
    $total_carb3 = 0;

    foreach($this->getValues()->totalcalorie_3 as $list) {
        $total_calorie3 += $list->calorie;
        $total_protein3 += $list->protein;
        $total_fat3 += $list->fat;
        $total_carb3 += $list->carb;
    }
    $this->setValues('calorie3', $total_calorie3);
    $this->setValues('protein3', $total_protein3);
    $this->setValues('fat3', $total_fat3 );
    $this->setValues('carb3', $total_carb3);




    
  }

}



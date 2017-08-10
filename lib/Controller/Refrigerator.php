<?php

namespace MyApp\Controller;

class Refrigerator extends \MyApp\Controller {

  public function run() {
    $searchModel = new \MyApp\Model\FoodSearch();
    
    $food = $_GET['food'];
    $this->setValues('foodfind',$searchModel->searchFind($food));
    foreach($this->getValues->foodfind as $food){
        echo $food->food_name;
    }
  }

}
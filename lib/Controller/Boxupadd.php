<?php

namespace MyApp\Controller;

class Boxupadd extends \MyApp\Controller {

  public function run() {
   	

    $boxAddModel = new \MyApp\Model\Box();



    $boxAddModel->create([
      'box_email' => $_POST['box_email'],
      'food_name' => $_POST["food_name"],
      'quantity' => htmlspecialchars($_POST['quantity']),
      'unit' => $_POST['unit'],
      'open_date' => $_POST['year']."-".$_POST['month']."-".$_POST['day'],


      ]);



    }


   

}


<?php

namespace MyApp\Controller;

class Boxup extends \MyApp\Controller {

  public function run() {
    
    $foodsearchModel = new \MyApp\Model\FoodSearch();
    $term = $_POST['search_term'];
    $this->setValues('box', $foodsearchModel->searchFind($term));
    $string = '';

  if($term==""){
    $string = "";
   }else{
  foreach($this->getValues()->box as $list){
    $email=$this->me()->email;
    $string .= "<table><tbody><tr><td><b>".$list->food_name."</b></td><td><button id=\"button\" data-name=\"$list->food_name\" data-unit=\"$list->unit\" data-boxaddemail=\"$email\">追加</button></td></tr></tbody></table></br>";
}}

  echo $string;
}

}
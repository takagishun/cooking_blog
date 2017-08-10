<?php

namespace MyApp\Controller;

class SearchForm extends \MyApp\Controller {

  public function run() {
   	
    $searchModel = new \MyApp\Model\SearchForm();
    $search = $_GET['search'];
    $this->setValues('searchfind', $searchModel->searchFind($search));
  }

}
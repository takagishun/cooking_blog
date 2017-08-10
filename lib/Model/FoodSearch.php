<?php

namespace MyApp\Model;

class FoodSearch extends \MyApp\Model {


  public function searchFind($term) {
    $stmt = $this->db->query("select food_name,unit from boxFoods where food_name like '%$term%' order by food_name asc");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  }





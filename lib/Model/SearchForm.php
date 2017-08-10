<?php

namespace MyApp\Model;

class SearchForm extends \MyApp\Model {


  public function searchFind($search) {
    $stmt = $this->db->query("select menu_name,menu_image,category_name,detail_category_name,menu_costs from Menus where menu_name like '%$search%' or category_name like '%$search%' or detail_category_name like '%$search%' or menu_name in (select menu_name from Ingredients where ingredient_name like '%$search%')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }


  // public function boxfind($term){
  // 	$stmt = $this->db->query("select name,phone from directory where name like '%$term%' or phone like '%$term%' order by name asc");
  //   $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
  //   return $stmt->fetchAll();

  // }

  }





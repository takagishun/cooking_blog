<?php

namespace MyApp\Model;

class Menu extends \MyApp\Model {

public function menufind() {
    $stmt = $this->db->query("select * from Menus order by menu_id");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function caloriefind($menu_name) {
    $stmt = $this->db->query("select * from Menus where menu_name = '$menu_name'");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }


   

  // 選択料理の料理名一覧

  // public function menuName($menu_name) {
  //   $stmt = $this->db->query("select menu_name from Menus where menu_name='$menu_name'");
  //   $result=$stmt->fetch();
  //   return $result['menu_name'];
  // }



  // 選択料理のカテゴリー名取得

  // public function menuCategory($menu_name) {
  //   $stmt = $this->db->query("select category_name from Menu_Category where category_id in (SELECT category_id FROM Menus WHERE menu_name='$menu_name')");
  //   $result=$stmt->fetch();
  //   return $result['category_name'];
  // }

  // 選択料理の詳細カテゴリー名取得

  //  public function detailMenuCategory($menu_name) {
  //   $stmt = $this->db->query("select detail_category_name from Menu_Detail_Category where (category_id,detail_category_id) in (SELECT category_id,detail_category_id FROM Menus WHERE menu_name='$menu_name')");
  //   $result=$stmt->fetch();
  //   return $result['detail_category_name'];
  // }

  // public function detailCategoryName($detail_category_name) {
  //   $stmt = $this->db->query("select detail_category_name from Menu_Detail_Category where (category_id,detail_category_id) in (SELECT category_id,detail_category_id FROM Menu_Detail_Category WHERE detail_category_name='$detail_category_name')");
  //   $result=$stmt->fetch();
  //   return $result['detail_category_name'];
  // }


  // カテゴリー名一覧取得

  public function categoryfind() {
    $stmt = $this->db->query("SELECT * FROM Menu_Category");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }


  public function costsfind($menu_name) {
    $stmt = $this->db->query("SELECT menu_costs FROM Menus where menu_name='$menu_name'");
    $result = $stmt->fetch();
    return $result['menu_costs'];
  }

  // public function costsfind($menu_name) {
  //   $stmt = $this->db->query("SELECT calorie FROM Menus where menu_name='$menu_name'");
  //   $result = $stmt->fetch();
  //   return $result['menu_costs'];
  // }

  // 選択カテゴリーの見出し用カテゴリー名取得

  // public function categorynamefind($category_name) {
  //   $stmt = $this->db->query("SELECT category_name FROM Menu_Category where category_name='$category_name'");
  //   $result = $stmt->fetch();
  //   return $result['category_name'];
  // }

  // 選択カテゴリーの詳細カテゴリー名一覧取得

  public function detailCategoryFind($category_name) {
    $stmt = $this->db->query("SELECT detail_category_name FROM Menu_Detail_Category where category_id in (select category_id from Menu_Category where category_name='$category_name') order by detail_category_id");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }  

  // 選択かテゴリーのメニュー一覧取得

  public function categorymenufind($category_name) {
    $stmt = $this->db->query("select * from Menus where category_name='$category_name'");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();

  }

  public function detailcategorymenufind($detail_category_name) {
    $stmt = $this->db->query("select * from Menus where detail_category_name='$detail_category_name'");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();

  }


  // 選択メニューの料理手順一覧取得

  public function menuProcedure($menu_name) {
    $stmt = $this->db->query("SELECT * FROM Procedures WHERE menu_name='$menu_name' order by procedure_number");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  // 選択メニューの材料一覧取得

  public function menuIngredients($menu_name) {
    $stmt = $this->db->query("SELECT * FROM Ingredients WHERE menu_name='$menu_name' order by ingredient_number");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }


  
 
  
}
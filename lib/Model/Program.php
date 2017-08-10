<?php

namespace MyApp\Model;

class Program extends \MyApp\Model {

  public function create($values) {
    $stmt = $this->db->prepare("insert into Program (email , program_menu_name,program_number) values (:email, :program_menu_name,:program_number)");
    $res = $stmt->execute([
      ':email' => $values['email'],
      ':program_menu_name' => $values['program_menu_name'],
      ':program_number' => $values['program_number']
    ]);
    
  }

  public function delete($values) {
    $stmt = $this->db->prepare("delete from Program where email = :email and program_menu_name = :program_menu_name; and program_number= :program_number");
    $res = $stmt->execute([
      ':email' => $values['email'],
      ':program_menu_name' => $values['program_menu_name'],
      ':program_number' => $values['program_number']

    ]);
    
  
  }


  public function programFind($menu_name,$email) {
    $stmt = $this->db->query("select * from Program where email= '$email' and program_menu_name in (select menu_name from Menus where menu_name = '$menu_name')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $count = $stmt->rowCount();
    if($count >=1 ){
      return "true";
    }elseif($count == 0){
      return "false";
    }
  }


  public function program1DetailFind($menu_name,$email,$program_number1) {
    $stmt = $this->db->query("select * from Program where email= '$email' and program_number = $program_number1 and program_menu_name in (select menu_name from Menus where menu_name = '$menu_name')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $count = $stmt->rowCount();
    if($count >=1 ){
      return "true";
    }elseif($count == 0){
      return "false";
    }
  }

  public function program2DetailFind($menu_name,$email,$program_number2) {
    $stmt = $this->db->query("select * from Program where email= '$email' and program_number = $program_number2 and program_menu_name in (select menu_name from Menus where menu_name = '$menu_name')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $count = $stmt->rowCount();
    if($count >=1 ){
      return "true";
    }elseif($count == 0){
      return "false";
    }
  }

  public function program3DetailFind($menu_name,$email,$program_number3) {
    $stmt = $this->db->query("select * from Program where email= '$email' and program_number = $program_number3 and program_menu_name in (select menu_name from Menus where menu_name = '$menu_name')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $count = $stmt->rowCount();
    if($count >=1 ){
      return "true";
    }elseif($count == 0){
      return "false";
    }
  }






  public function programNotFind() {
    return null;
  }




 public function program1MenusFind($email,$program1) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select program_menu_name from Program where email='$email' and program_number = $program1)");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function program2MenusFind($email,$program2) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select program_menu_name from Program where email='$email' and program_number = $program2)");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function program3MenusFind($email,$program3) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select program_menu_name from Program where email='$email' and program_number = $program3)");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }




 public function program1IngredientsFind($email,$program1) {
    $stmt = $this->db->query("select ingredient_name,sum(quantity) as total_quantity,unit,sum(ingredient_costs) as total_ingredient_costs from Ingredients where menu_name in (select program_menu_name from Program where email='$email' and program_number=$program1) group by ingredient_name");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function program2IngredientsFind($email,$program2) {
    $stmt = $this->db->query("select ingredient_name,sum(quantity) as total_quantity,unit,sum(ingredient_costs) as total_ingredient_costs from Ingredients where menu_name in (select program_menu_name from Program where email='$email' and program_number=$program2) group by ingredient_name");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function program3IngredientsFind($email,$program3) {
    $stmt = $this->db->query("select ingredient_name,sum(quantity) as total_quantity,unit,sum(ingredient_costs) as total_ingredient_costs from Ingredients where menu_name in (select program_menu_name from Program where email='$email' and program_number=$program3) group by ingredient_name");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }



   public function caloriefind1($email,$program1) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select program_menu_name from Program where email = '$email' and program_number = $program1)");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function caloriefind2($email,$program2) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select program_menu_name from Program where email = '$email' and program_number = $program2)");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function caloriefind3($email,$program3) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select program_menu_name from Program where email = '$email' and program_number = $program3)");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }




// 保留　材料、メニュー一覧

  // public function programListFind($email) {
  //   $stmt = $this->db->query("select Menus.menu_costs,Menus.calorie,Menus.menu_name,Menus.menu_image,Menus.category_name,Menus.detail_category_name,GROUP_CONCAT(' ',Ingredients.ingredient_name,'/',Ingredients.quantity,Ingredients.unit,' ') as namae from Menus inner join Ingredients on Ingredients.id = Menus.menu_id inner join Program on Menus.menu_name = Program.program_menu_name where email='$email' group by Menus.menu_name;");
  //   $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
  //   return $stmt->fetchAll();
    
  // }

}
  // select Menus.id,Menus.menu_image Menus from Menus.id = Favos.favo_menu_name and Favos.email='$emai


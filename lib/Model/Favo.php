<?php

namespace MyApp\Model;

class Favo extends \MyApp\Model {

  public function create($values) {
    $stmt = $this->db->prepare("insert into Favos (email , favo_menu_name) values (:email, :favo_menu_name)");
    $res = $stmt->execute([
      ':email' => $values['email'],
      ':favo_menu_name' => $values['favo_menu_name']
    ]);
    
  }

  public function delete($values) {
    $stmt = $this->db->prepare("delete from Favos where email = :email and favo_menu_name = :favo_menu_name;");
    $res = $stmt->execute([
      ':email' => $values['email'],
      ':favo_menu_name' => $values['favo_menu_name']
    ]);
    
  
  }


  public function favoFind($menu_name,$email) {
    $stmt = $this->db->query("select * from Favos where email= '$email' and favo_menu_name in (select menu_name from Menus where menu_name = '$menu_name')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $count = $stmt->rowCount();
    if($count >=1 ){
      return "true";
    }elseif($count == 0){
      return "false";
    }
  }

  public function favoNotFind() {
    return null;
  }


  public function favoListFind($email) {
    $stmt = $this->db->query("select * from Menus where menu_name in (select favo_menu_name from Favos where email='$email')");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $count = $stmt->rowCount();
    return $stmt->fetchAll();
  }

  // select Menus.id,Menus.menu_image Menus from Menus.id = Favos.favo_menu_name and Favos.email='$email'
}
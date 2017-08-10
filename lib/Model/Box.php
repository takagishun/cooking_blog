<?php

namespace MyApp\Model;

class Box extends \MyApp\Model {

  public function create($values) {
    $stmt = $this->db->prepare("insert into myBox (box_email , food_name , quantity ,unit,open_date) values (:box_email, :food_name, :quantity, :unit, :open_date)");
    $res = $stmt->execute([
      ':box_email' => $values['box_email'],
      ':food_name' => $values['food_name'],
      ':quantity' => $values['quantity'],
      ':unit' => $values['unit'],
      ':open_date' => $values['open_date']

    ]);
    
  }


  public function delete($values) {
    $stmt = $this->db->prepare("delete from myBox where id = :id");
    $res = $stmt->execute([
      ':id' => $values['id'],
    ]);
    
  
  }
  
  public function boxitemfind($email) {
    $stmt = $this->db->query("select id,box_email,food_name,quantity,unit,date_format(open_date, '%Y年%c月%e日') as open_date from myBox where box_email ='$email' order by open_date;");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  }
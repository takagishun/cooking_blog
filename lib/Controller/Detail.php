<?php

namespace MyApp\Controller;

class Detail extends \MyApp\Controller {



  public function run() {
    

    // get users info
    $menu_name = $_GET['menu_name'];
    $menuModel = new \MyApp\Model\Menu();
    // $this->setValues('menuname', $menuModel->menuName($menu_name));
    // $this->setValues('category_name', $menuModel->menuCategory($menu_name));
    // $this->setValues('detail_category_name', $menuModel->detailMenuCategory($menu_name));
    $this->setValues('procedure', $menuModel->menuProcedure($menu_name));
    $this->setValues('ingredients', $menuModel->menuIngredients($menu_name));
    $this->setValues('menucosts', $menuModel->costsfind($menu_name));
    $this->setValues('calorie', $menuModel->caloriefind($menu_name));

 if ($this->me() != null){


    $favoModel = new \MyApp\Model\Favo();
    $email = $this->me()->email;
    $this->setValues('favo_added', $favoModel->favoFind($menu_name,$email));
    
}


 if ($this->me() != null){


    $programModel = new \MyApp\Model\Program();
    $email = $this->me()->email;
    $program_number1 = 1;
    $program_number2 = 2;
    $program_number3 = 3;
    $this->setValues('program_added', $programModel->programFind($menu_name,$email));
    $this->setValues('program_1_added', $programModel->program1DetailFind($menu_name,$email,$program_number1));
    $this->setValues('program_2_added', $programModel->program2DetailFind($menu_name,$email,$program_number2));
    $this->setValues('program_3_added', $programModel->program3DetailFind($menu_name,$email,$program_number3));

    
}
   

  
}


    // public function favo() {
    //     if($this->me()==null){
    //         echo 'guest';
    // }else{
    //      echo h($this->me()->email);
    // }
    // }
}
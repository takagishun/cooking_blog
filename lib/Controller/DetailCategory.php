<?php

namespace MyApp\Controller;

class DetailCategory extends \MyApp\Controller {

  public function run() {
    // if (!$this->isLoggedIn()) {
    //   // login
    //   header('Location: ' . SITE_URL . '/login.php');
    //   exit;
    // }

    // get users info
    $detail_category_name= $_GET['detail_category_name'];
    $category_name= $_GET['category_name'];
    $menuModel = new \MyApp\Model\Menu();
    $this->setValues('DetailCategory', $menuModel->detailCategoryFind($category_name));
    // $this->setValues('category_name', $menuModel->categorynamefind($category_name));
    // $this->setValues('detail_category_name', $menuModel->detailCategoryName($detail_category_name));
    $this->setValues('Detail_Category_menus', $menuModel->detailcategorymenufind($detail_category_name));


  }


  public function addclass(){
    $detail_category_name = $_GET['detail_category_name'];

    foreach($this->getValues()->DetailCategory as $list){
       echo $detaillist=$list->detail_category_name;


        if ($detail_category_name != $detaillist) {
            continue;
        }else{
            echo "aa";
        }


    }
        
  }

}
<?php

namespace MyApp\Controller;

class Category extends \MyApp\Controller {

  public function run() {
    

    // get users info
    $category_name= $_GET['category_name'];
    $menuModel = new \MyApp\Model\Menu();
    $this->setValues('Menus', $menuModel->menufind());
    $this->setValues('DetailCategory', $menuModel->detailCategoryFind($category_name));
    // $this->setValues('category_name', $menuModel->categorynamefind($category_name));
    $this->setValues('Category_menus', $menuModel->categorymenufind($category_name));


  }

}
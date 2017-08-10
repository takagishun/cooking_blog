<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\ProgramList();

$app->run();

// $app->me()
// $app->getValues()->users

?>
<!DOCTYPE html>
<html lang="ja">


<head>
  <?php require_once(__DIR__ . '/about/head.php');?>
  <title>takagi kitchen</title>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




  <script src="http://192.168.33.10:8000/js/index.js"></script>
  <script type="text/javascript" src="//192.168.33.10:8000/js/programlist.js" id="calorie"
   data-protein1="<?= h($app->getValues()->protein1) ?>"
   data-fat1="<?= h($app->getValues()->fat1) ?>"
   data-carb1="<?= h($app->getValues()->carb1) ?>"
   data-protein2="<?= h($app->getValues()->protein2) ?>"
   data-fat2="<?= h($app->getValues()->fat2) ?>"
   data-carb2="<?= h($app->getValues()->carb2) ?>"
   data-protein3="<?= h($app->getValues()->protein3) ?>"
   data-fat3="<?= h($app->getValues()->fat3) ?>"
   data-carb3="<?= h($app->getValues()->carb3) ?>"
   >
  </script>

  <link rel="stylesheet" type="text/css" href="http://192.168.33.10:8000/css/programlist.css">

</head>


<body>
   

   <?php require_once(__DIR__ . '/about/header.php');?>
   

   <div id="breadcrumb">
    <ul class="breadcrumb-inner">
      <li>
        <a href="http://192.168.33.10:8000/index.php">
          <span>TOP</span>
        </a>
      </li>
      <span>></span>
      <li>
          <span>MY献立</span>
      </li>
    </ul>
    </div>
   

    <div class="container">
      

      
      
        <div class="programlist-wrapper">

          <!-- タブメニュー　リスト -->

            <div id="tabs">
                
                <ul>
                  <li><a href="#tabs-1">献立１</a></li>
                  <li><a href="#tabs-2">献立２</a></li>
                  <li><a href="#tabs-3">献立３</a></li>
                </ul>

              <!-- 献立１　コンテンツ -->


                <div id="tabs-1" class="tab">



                    <?php if($app->getValues()->Program_1_List==null){echo "<p id='findnull1' class='findnull'>MY献立登録されたレシピがありません</p>";} ?>


                    <?php foreach($app->getValues()->Program_1_List as $menu): ?>
                    <div class="column-box">
                      <a href="http://192.168.33.10:8000/detail.php?category_name=<?= h($menu->category_name);?>&amp;detail_category_name=<?= h($menu->detail_category_name)?>&amp;menu_name=<?= h($menu->menu_name); ?>">
                        <div class="column-image" style="background-image: url('images/<?php echo h($menu->menu_image);?>')">
                          <div class="zoom-black">
                          </div>
                        </div>
                      </a>
                    </div>
                    <?php endforeach; ?>
                
                    <div class="clear"></div>


                    <div class="program1-contents">

                        <div id="read-more1" class="read-more"><p>詳細を見る<i class="fa fa-caret-square-o-down" aria-hidden="true"></i></p></div>
                        <div id="read-hide1" class="read-hide"><p>閉じる<i class="fa fa-caret-square-o-up" aria-hidden="true"></i></p></div>
                
                        <div id="content-wrapper1" class="content-wrapper">
                            
                            <div class="shopping-list">
                                <h2>買い物リスト</h2>
                                <table>
                                    <thead><tr><th>材料</th><th>分量</th><th>コスト</th></tr></thead>
                                    <tbody>
                                      <?php $total_costs=0 ?>
                                      <?php foreach($app->getValues()->Program_1_Ingredients as $list): ?>
                                      <?php $total_costs += $list->total_ingredient_costs; ?>
                                      <tr><td><?= h($list->ingredient_name) ?></td><td><?php if($list->total_quantity==0){echo $list->unit;}else{echo h($list->total_quantity).h($list->unit);}  ?></td><td><?= h($list->total_ingredient_costs)?>円</td></tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                      <tr><td>合計</td><td></td><td>¥<?php echo $total_costs ?></td></tr>
                                    </tfoot>
                                </table>
                            </div>
                       

                            <div class="chart">
                                
                                <div class="chart1">
                                    <h2>総カロリーと３大栄養素</h2><p class="guide">(一食あたりの目安)</p>
                                    <table>
                                        <tbody>
                                            <tr><td>エネルギー</td><td><?= h($app->getValues()->calorie1)?>kcal</td><td class="guide-text">536～751kcal</td></tr>
                                            <tr>
                                            <td colspan="3">
                                            <div class="chart-xbar-01">
                                            <div class="data-01" style="width:<?php if((h($app->getValues()->calorie1)/751 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->calorie1)/751 * 100 ;}?>%"></div>
                                            </div>
                                            </td>
                                            </tr>
                                            <tr><td>タンパク質</td><td><?= h($app->getValues()->protein1)?>kcal</td><td class="guide-text">60～136kcal</td></tr>
                                            <tr>
                                            <td colspan="3">
                                            <div class="chart-xbar-01">
                                            <div class="data-01" style="width:<?php if((h($app->getValues()->protein1)/136 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->protein1)/136 * 100 ;}?>%"></div>
                                            </div>
                                            </td>
                                            </tr>
                                            <tr><td>脂質</td><td><?= h($app->getValues()->fat1)?>kcal</td><td class="guide-text">117～180kcal</td></tr>
                                            <tr>
                                            <td colspan="3">
                                            <div class="chart-xbar-01">
                                            <div class="data-01" style="width:<?php if((h($app->getValues()->fat1)/180 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->fat1)/180 * 100 ;}?>%"></div>
                                            </div>
                                            </td>
                                            </tr>
                                            <tr><td>炭水化物</td><td><?= h($app->getValues()->carb1)?>kcal</td><td class="guide-text">300～420kcal</td></tr>
                                            <tr>
                                            <td colspan="3"> 
                                            <div class="chart-xbar-01">
                                            <div class="data-01" style="width:<?php if((h($app->getValues()->carb1)/420 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->carb1)/420 * 100 ;}?>%"></div>
                                            </div>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                               
                                <div class="chart2">
                                    <h2>PFCバランス</h2>
                                    <canvas id="myChart1"></canvas>
                                </div>
                                 
                           </div>
                      
                           <div class="clear"></div>
                       
                       </div>

                   </div>
                   

               </div>


               <!-- 献立２　コンテンツ -->


               <div id="tabs-2" class="tab">



                  <?php if($app->getValues()->Program_2_List==null){echo "<p id='findnull2' class='findnull'>MY献立登録されたレシピがありません</p>";} ?>



                    <?php foreach($app->getValues()->Program_2_List as $menu): ?>
                    <div class="column-box">
                      <a href="http://192.168.33.10:8000/detail.php?category_name=<?= h($menu->category_name);?>&amp;detail_category_name=<?= h($menu->detail_category_name)?>&amp;menu_name=<?= h($menu->menu_name); ?>">
                        <div class="column-image" style="background-image: url('images/<?php echo h($menu->menu_image);?>')">
                          <div class="zoom-black">
                          </div>
                        </div>
                      </a>
                    </div>
                    <?php endforeach; ?>
                
                    <div class="clear"></div>


                    <div class="program-contents">

                      <div id="read-more2" class="read-more"><p>詳細を見る<i class="fa fa-caret-square-o-down" aria-hidden="true"></i></p></div>
                      <div id="read-hide2" class="read-hide"><p>閉じる<i class="fa fa-caret-square-o-up" aria-hidden="true"></i></p></div>
                
                    <div id="content-wrapper2" class="content-wrapper">

                        <div class="shopping-list">
                          <h2>買い物リスト</h2>
                          <table>
                            <thead><tr><th>材料</th><th>分量</th><th>コスト</th></tr></thead>
                            <tbody>
                              <?php $total_costs=0 ?>
                              <?php foreach($app->getValues()->Program_2_Ingredients as $list): ?>
                              <?php $total_costs += $list->total_ingredient_costs; ?>
                              <tr><td><?= h($list->ingredient_name) ?></td><td><?php if($list->total_quantity==0){echo $list->unit;}else{echo h($list->total_quantity).h($list->unit);}  ?></td><td><?= h($list->total_ingredient_costs)?>円</td></tr>
                              <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                              <tr><td>合計</td><td></td><td>¥<?php echo $total_costs ?></td></tr>
                            </tfoot>
                          </table>
                        </div>
                   

                        <div class="chart">
                            
                            <div class="chart1">
                                <h2>総カロリーと３大栄養素</h2><p class="guide">(一食あたりの目安)</p>
                                <table>
                                    <tbody>
                                        <tr><td>エネルギー</td><td><?= h($app->getValues()->calorie2)?>kcal</td><td class="guide-text">536～751kcal</td></tr>
                                        <tr>
                                        <td colspan="3">
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->calorie2)/751 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->calorie2)/751 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr><td>タンパク質</td><td><?= h($app->getValues()->protein2)?>kcal</td><td class="guide-text">60～136kcal</td></tr>
                                        <tr>
                                        <td colspan="3">
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->protein2)/136 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->protein2)/136 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr><td>脂質</td><td><?= h($app->getValues()->fat2)?>kcal</td><td class="guide-text">117～180kcal</td></tr>
                                        <tr>
                                        <td colspan="3">
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->fat2)/180 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->fat2)/180 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr><td>炭水化物</td><td><?= h($app->getValues()->carb2)?>kcal</td><td class="guide-text">300～420kcal</td></tr>
                                        <tr>
                                        <td colspan="3"> 
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->carb2)/420 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->carb2)/429 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                           
                            <div class="chart2">
                                <h2>PFCバランス</h2>
                                <canvas id="myChart2"></canvas>
                            </div>
                             
                       </div>
                  
                       <div class="clear"></div>
                   
                   </div>

                 </div>
               

               </div>

               <!-- 献立３　コンテンツ -->

               <div id="tabs-3" class="tab">


                  <?php if($app->getValues()->Program_3_List==null){echo "<p id='findnull3' class='findnull'>MY献立登録されたレシピがありません</p>";} ?>

                    <?php foreach($app->getValues()->Program_3_List as $menu): ?>
                    <div class="column-box">
                      <a href="http://192.168.33.10:8000/detail.php?category_name=<?= h($menu->category_name);?>&amp;detail_category_name=<?= h($menu->detail_category_name)?>&amp;menu_name=<?= h($menu->menu_name); ?>">
                        <div class="column-image" style="background-image: url('images/<?php echo h($menu->menu_image);?>')">
                          <div class="zoom-black">
                          </div>
                        </div>
                      </a>
                    </div>
                    <?php endforeach; ?>
                
                    <div class="clear"></div>


                    <div class="program-contents">

                      <div id="read-more3" class="read-more"><p>詳細を見る<i class="fa fa-caret-square-o-down" aria-hidden="true"></i></p></div>
                      <div id="read-hide3" class="read-hide"><p>閉じる<i class="fa fa-caret-square-o-up" aria-hidden="true"></i></p></div>
                
                    <div id="content-wrapper3" class="content-wrapper">

                        
                        <div class="shopping-list">
                          <h2>買い物リスト</h2>
                          <table>
                            <thead><tr><th>材料</th><th>分量</th><th>コスト</th></tr></thead>
                            <tbody>
                              <?php $total_costs=0 ?>
                              <?php foreach($app->getValues()->Program_3_Ingredients as $list): ?>
                              <?php $total_costs += $list->total_ingredient_costs; ?>
                              <tr><td><?= h($list->ingredient_name) ?></td><td><?php if($list->total_quantity==0){echo $list->unit;}else{echo h($list->total_quantity).h($list->unit);}  ?></td><td><?= h($list->total_ingredient_costs)?>円</td></tr>
                              <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                              <tr><td>合計</td><td></td><td>¥<?php echo $total_costs ?></td></tr>
                            </tfoot>
                          </table>
                        </div>
                   

                        <div class="chart">
                            
                            <div class="chart1">
                                <h2>総カロリーと３大栄養素</h2><p class="guide">(一食あたりの目安)</p>
                                <table>
                                    <tbody>
                                        <tr><td>エネルギー</td><td><?= h($app->getValues()->calorie3)?>kcal</td><td class="guide-text">536～751kcal</td></tr>
                                        <tr>
                                        <td colspan="3">
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->calorie3)/751 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->calorie3)/751 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr><td>タンパク質</td><td><?= h($app->getValues()->protein3)?>kcal</td><td class="guide-text">60～136kcal</td></tr>
                                        <tr>
                                        <td colspan="3">
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->protein3)/136 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->protein3)/136 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr><td>脂質</td><td><?= h($app->getValues()->fat3)?>kcal</td><td class="guide-text">117～180kcal</td></tr>
                                        <tr>
                                        <td colspan="3">
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->fat3)/180 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->fat3)/180 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr><td>炭水化物</td><td><?= h($app->getValues()->carb3)?>kcal</td><td class="guide-text">300～420kcal</td></tr>
                                        <tr>
                                        <td colspan="3"> 
                                        <div class="chart-xbar-01">
                                        <div class="data-01" style="width:<?php if((h($app->getValues()->carb3)/420 * 100) >= 100){ echo 100;}else{echo h($app->getValues()->carb2)/420 * 100 ;}?>%"></div>
                                        </div>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                           
                            <div class="chart2">
                                <h2>PFCバランス</h2>
                                <canvas id="myChart3"></canvas>
                            </div>
                             
                       </div>
                  
                   <div class="clear"></div>
                   
                   </div>

                  </div>
               

               </div>


              </div>

        </div>

   </div>











 
      <?php require_once(__DIR__ . '/about/footer.php');?>
  
</body>
</html>

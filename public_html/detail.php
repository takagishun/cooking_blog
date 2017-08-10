<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Detail();

$app->run();

// $app->me()
// $app->getValues()->users

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  	<?php require_once(__DIR__ . '/about/head.php');?>
	<title><?php echo h($_GET['menu_name']); ?></title>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	




	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
	


	<script type="text/javascript" src="//192.168.33.10:8000/js/favo.js"></script>
    <script type="text/javascript" src="//192.168.33.10:8000/js/program.js"></script>
	

	<link rel="stylesheet" type="text/css" href="//192.168.33.10:8000/css/detail.css">
	<?php foreach($app->getValues()->calorie as $list): ?>
	<script type="text/javascript" src="//192.168.33.10:8000/js/detail.js" id="calorie"
	 data-protein="<?= h($list->protein) ?>"
	 data-fat="<?= h($list->fat) ?>"
	 data-carb="<?= h($list->carb) ?>">
	 </script>
	<?php endforeach ; ?>

    

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
				<a href="http://192.168.33.10:8000/category.php?category_name=<?php echo h($_GET['category_name'])?>">
					<span><?php echo h($_GET['category_name']); ?></span>
				</a>
			</li>
			<span>></span>
			<li>
				<a href="http://192.168.33.10:8000/detailCategory.php?category_name=<?php echo h($_GET['category_name']);?>&amp;detail_category_name=<?php echo h($_GET['detail_category_name']);?>">
					<span><?php echo h($_GET['detail_category_name']); ?></span>
				</a>
			</li>
			<span>></span>
			<li>
					<span><?php echo h($_GET['menu_name']) ?></span>
			</li>
		</ul>
		
		 
		

	</div>
	<div class="container">

		<div class="modal-wrapper">
			<div id="program-modal">
				<ul>
					<li>献立１に登録<span class="fa fa-cutlery modal-program" aria-hidden="true"  id="program-1"  data-condition="<?= h($app->getValues()->program_1_added)?>" onClick="ajaxProgram1Func('<?= h($app->me()->email); ?>','<?= h($_GET['menu_name']); ?>','1');"></span></li>
					<li>献立２に登録<span class="fa fa-cutlery modal-program" aria-hidden="true"  id="program-2"  data-condition="<?= h($app->getValues()->program_2_added)?>" onClick="ajaxProgram2Func('<?= h($app->me()->email); ?>','<?= h($_GET['menu_name']); ?>','2');"></span></li>
					<li>献立３に登録<span class="fa fa-cutlery modal-program" aria-hidden="true"  id="program-3"  data-condition="<?= h($app->getValues()->program_3_added)?>" onClick="ajaxProgram3Func('<?= h($app->me()->email); ?>','<?= h($_GET['menu_name']); ?>','3');"></span></li>
				</ul>
				<button class="modal-hide">閉じる</button>
			</div>
		</div>


		<h1 class="title">
			<span class="title-item">¥<?php echo $app->getValues()->menucosts; ?></span>
			<?php echo h($_GET['menu_name']); ?>
			<span  id="favo"  data-condition="<?= h($app->getValues()->favo_added)?>" onClick="ajaxFavoFunc('<?= h($app->me()->email); ?>','<?= h($_GET['menu_name']); ?>');"></span>
			<span class="fa fa-cutlery modal-show" aria-hidden="true"  id="program"  data-condition="<?= h($app->getValues()->program_added)?>" ></span>
		</h1>
		<div class="slider-box">
			<div class="slider">
		  	<?php foreach($app->getValues()->procedure as $procedure): ?>
				<div>
			    	<img src="http://192.168.33.10:8000/images/<?php echo h($procedure->procedure_image); ?>" alt="">
			    	<p><?php echo h($procedure->procedure_text); ?></p>
			    </div>
			<?php endforeach; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="chart">
		<div class="chart1">
		<?php foreach($app->getValues()->calorie as $kcal): ?>
		<h2>総カロリーと３大栄養素</h2><p class="guide">(一食あたりの目安)</p>
		<table>
		<tbody>
		<tr><td>エネルギー</td><td><?= h($kcal->calorie.'kcal') ?></td><td class="guide-text">536～751kcal</td></tr>
		<tr>
		<td colspan="3">
		<div class="chart-xbar-01">
		<div class="data-01" style="width:<?= h($kcal->calorie)/751 * 100 ?>%"></div>
		</div>
		</td>
	    </tr>
		<tr><td>タンパク質</td><td><?= h($kcal->protein.'kcal') ?></td><td class="guide-text">60～136kcal</td></tr>
		<tr>
		<td colspan="3">
		<div class="chart-xbar-01">
		<div class="data-01" style="width:<?= h($kcal->protein)/136 * 100 ?>%"></div>
		</div>
		</td>
	    </tr>
		<tr><td>脂質</td><td><?= h($kcal->fat.'kcal') ?></td><td class="guide-text">117～180kcal</td></tr>
		<tr>
		<td colspan="3">
		<div class="chart-xbar-01">
		<div class="data-01" style="width:<?= h($kcal->fat)/180 * 100 ?>%"></div>
		</div>
		</td>
	    </tr>
		<tr><td>炭水化物</td><td><?= h($kcal->carb.'kcal') ?></td><td class="guide-text">300～420kcal</td></tr>
		<tr>
		<td colspan="3"> 
		<div class="chart-xbar-01">
		<div class="data-01" style="width:<?= h($kcal->carb)/420 * 100 ?>%"></div>
		</div>
		</td>
	    </tr>
		</tbody>
		</table>
		<?php endforeach; ?>
	    </div>
		<div class="chart2">
		<h2>PFCバランス</h2>
		<canvas id="myChart">

		</canvas>
		</div>
		<div class="clear"></div>
	    </div>


		<div class="contents-text">
			<div class="material">
				<h2>材料(2人前)</h2>
				<table>
					<thead>
					<tr><th>材料</th><th>分量</th><th>値段</th></tr>
					</thead>
					<tbody>
					<?php $total_costs=0 ?>
		  		    <?php foreach($app->getValues()->ingredients as $ingredient): ?>
		  		    <?php $total_costs += $ingredient->ingredient_costs; ?>
					<tr><td><?php echo h($ingredient->ingredient_name)?></td><td><?php if($ingredient->quantity==0){echo $ingredient->unit;}else{echo h($ingredient->quantity).h($ingredient->unit);} ?></td><td>¥<?php echo h($ingredient->ingredient_costs) ?></td></tr>
					<?php endforeach; ?>
					</tbody>
					<tfoot>
					<tr><td>合計</td><td></td><td>¥<?php echo $total_costs ?></td></tr>
					</tfoot>
				</table>
			</div>
			<div class="method">
				<h2>作り方</h2>
				<ol>
		        <?php foreach($app->getValues()->procedure as $procedure): ?>
					<li><p><?php echo h($procedure->procedure_text)  ?></p></li>
			    <?php endforeach; ?>
				</ol>
			</div>
			<div class="clear"></div>
		</div>
    </div>
   <?php require_once(__DIR__ . '/about/footer.php');?>
</body>
</html>
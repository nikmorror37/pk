<?php
/*Запускаем сессию*/
session_start();
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
header("Content-Type: text/html; charset=utf-8");

ShowHeader();
ShowMenu('',current,'','','');
ShowLeftSidebar();
?>           
    <div class="content_section">    
    <h2>Корзина интернет-магазина</h2>                   
    </div>			
    <div class="content_section">  
	<?
	if($count){
		echo "<p>Вернуться в <a href='products.php'>каталог товаров.</a></p>";
	}else{
		echo "<p>Корзина пуста. Вернитесь в <a href='products.php'>каталог товаров</a></p>";
	}
	?>					
	<table border="0" cellpadding="3" cellspacing="0" width="100%">		
	<tr>
		<td><h4>Артикул</h4></td>
		<td><h4>Товар</h4></td>												
		<td><h4>Кол-во</h4></td>	
		<td><h4>Цена</h4></td>	
	</tr>					
    <?
		$goods = myBasket();
		$i = 1;
		$sum = 0;					
		foreach($goods as $item){				
		?>						
			<tr>
			<td><?=$item["article"]?></td>
			<td><?=$item["name"]?></td>												
			<td><?=$item["quantity"]?>шт.</td>	
			<td><?=$item["price"]?>р.</td>
			<td><a href="delete_from_basket.php?id=<?=$item["id"]?>"><img src="images/del.ICO" alt="product" /></a></td>
			</tr>					
		<?
		$i++;
		$sum += $item["price"]*$item["quantity"];
		}
	?>
	<tr><h3>Всего товаров в корзине на сумму: <?=$sum?> руб. </h3>
	<?
	if ($sum > 0) {?>
		<div class="button_01"><a href="orderform.php" target="_parent">Оформить заказ!</a></div></tr>
    <? } ?>
	</table>
	</div></div></div></div>   
<?
ShowNews();
ShowFooter();
?>
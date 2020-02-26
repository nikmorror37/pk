<?php
/*Запускаем сессию*/
session_start();
/*подключение библиотек*/
require "shop_lib.inc.php";
require "shop_db.inc.php";
/*Получаем id категорию товара*/
header("Content-Type: text/html; charset=utf-8");

ShowHeader();
ShowMenu(current,'','','','');
ShowLeftSidebar();
?>           
    <div class="content_section">  	
	<?
	$login = $_SESSION['login'];
	$password = $_SESSION['password'];		
	if(empty($login) and empty($password))
	{						
		echo "<h2>Панель администратора магазина!</h2>";
		echo "<p>Необходимо пройти авторизацию | <a href='enterform.php'>Вход</a></p>";					
	}
	else
	{
		echo "<h2>Заказы магазина</h2>";
		echo "<p>Вы вошли как '$login' | <a href='exit.php'>Выход</a></p>";
		echo "<p>Вернуться в <a href='enterform.php'>панель администратора</a></p>";						 
		$orders = getOrders();					
		foreach($orders as $order){
			$sum = 0;
			if ($order["V"] == 1) {?>
				<hr><h3><a href="edit_order.php?id=<?=$order["id"]?>"><img src="images/edit.ICO" alt="product" />Заказ № <?=$order["id"]?></h3></a>	
			<?} 
			else {?>
				<hr><h3><a href="edit_order.php?id=<?=$order["id"]?>"><img src="images/del.ICO" alt="product" />Заказ № <?=$order["id"]?></h3></a>
			<?}?>							
			<h3>Заказчик: <?=$order["fio"]?></h3>						
			<h3>Эл.почта: <?=$order["email"]?></h3>
			<h3>Тел: <?=$order["phone"]?></h3>
			<h3>Адрес: <?=$order["address"]?></h3>
			<table border="1" cellpadding="3" cellspacing="0" width="100%">		
			<tr>
				<td></td>
				<td><h4>Артикул</h4></td>
				<td><h4>Товар</h4></td>																		
				<td><h4>Количество</h4></td>	
				<td><h4>Цена</h4></td>	
			</tr>							
			<?
			$ii = 0;
			$orderst = getOrdersT($order["id"]);					
			foreach($orderst as $item){
				$ii++;
				$sum += $item["quantity"] * $item["price"] ?>						
				<tr><td><?=$ii?></td>								
				<td><?=$item["article"]?></td>
				<td><?=$item["name"]?></td>										
				<td><?=$item["quantity"]?>шт.</td>	
				<td><?=$item["price"]?>р.</td>	
				</tr>					
				<?
			}
			echo "</table>";
		echo "<h3>Общая сумма заказа: $sum р.</h3>";
		}					
	}?>									
	</div></div></div></div>    
<?
ShowNews();
ShowFooter();
?>
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
		echo "<h2>Панель администратора !</h2>";
		echo "<p>Необходимо пройти авторизацию | <a href='enterform.php'>Вход</a></p>";					
	}
	else
	{
		echo "<h2>Каталог товаров магазина</h2>";
		echo "<p>Вы вошли как '$login' | <a href='exit.php'>Выход</a></p>";
		echo "<p>Вернуться в <a href='enterform.php'>панель администратора</a></p>";
	?>	         
	<div class="button_01"><a href="catalogform.php" target="_parent">Добавить</a></div>
	<table border="0" cellpadding="3" cellspacing="0" width="100%">		
	<tr>
		<td></td>
		<td><h4>Артикул</h4></td>
		<td><h4>Товар</h4></td>																		
		<td></td>	
	</tr>					
    <?
	$goods = selectAllByGroup();					
	foreach($goods as $item){				
	?>						
	<tr>
		<td><a href="catalogforme.php?id=<?=$item["id"]?>"><img src="images/edit.ICO" alt="product" /></a></td>							
		<td><?=$item["article"]?></td>
		<td><?=$item["name"]?></td>												
		<td><a href="delete_from_catalog.php?id=<?=$item["id"]?>"><img src="images/del.ICO" alt="product" /></a></td>			
	</tr>					
	<?
	}
	?>
    </table>	
	<?
	}?>									
	</div></div></div></div>    
<?
ShowNews();
ShowFooter();
?>
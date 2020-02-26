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
		echo "<h2>Форма добавления товара в каталог</h2>";
		echo "<p>Вы вошли как '$login' | <a href='exit.php'>Выход</a></p>";
		echo "<p>Вернуться в <a href='catalogs.php'>каталог товаров</a></p>";
	?>	                   					
	<form enctype="multipart/form-data" action="save2cat.php" method="post">					
	<?					
	$items = "<h4>Тип товара:<select name='type' size='1' style='width:200px;'>
	<option value='vse'>Выберите из списка</option>";					
	$type = selecttypeAll();					
	foreach($type as $types)
	{
		$items .= "<option value='".$types['id']."'>".$types['type']."</option>";
	};					
	$items .= "</select></h4>";
	echo $items;
	?>					
	<h4>Артикул: <input type="text" name="article" size="20"></h4>
	<h4>Картинка: <input name="myfile" type="file"></h4>
	<h4>Название: <textarea name="name" cols="50" rows="3"></textarea></h4>
	<h4>Описание: <textarea name="note" cols="50" rows="5"></textarea></h4>
	<h4>Количество: <input type="text" name="amount" size="20"></h4>
	<h4>Цена: <input type="text" name="price" size="20"></h4>
	<h4>Скидка: <input type="text" name="discount" size="20"></h4>
	<p><input type="submit" value="Добавить"></p>
	</form>
	<?
	}
	?>					
	</div></div></div></div>
    
<?
ShowNews();
ShowFooter();
?>
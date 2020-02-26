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
    <h2>Оформление заказа в интернет-магазине!</h2>                   
    </div> 				
    <div class="content_section">
	<?
	if($count){
		echo "<p>Вернуться в <a href='products.php'>каталог товаров.</a></p>";
	}else{
		echo "<p>Корзина пуста. Вернитесь в <a href='products.php'>каталог товаров</a></p>";
	}
	?>
	<form action="saveorder.php" method="post">
		<h4>Заказчик: <input type="text" name="name" size="50"></h4>
		<h4>Email заказчика: <input type="text" name="email" size="50"></h4>
		<h4>Телефон для связи: <input type="text" name="phone" size="50"></h4>
		<h4>Адрес доставки: <br><textarea name="address" cols="50" rows="5"></textarea></h4>						
		<div class="button_01"><h4><p><input type="submit" value="Заказать"></h4></div></tr>
	</form>
	</div></div></div></div>  				
<?
ShowNews();
ShowFooter();
?>
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
	<?php
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		
		if(empty($login) and empty($password))
		{?>
			<h2>Вход в панель администратора магазина!</h2> 
			<table align="center">
			<form action="enter.php" method="POST">
			<tr><td><h3>Логин:</h3></td>
			<td><input type="text" name="login"></td></tr>
			<tr><td><h3>Пароль:</h3></td>
			<td><input type="password" name="password"></td></tr>
			<tr><td align="center" colspan="2"><input type="submit" value="Войти" name="submit"></td></tr>
			</table>
		<?php
		}
		else
		{
			echo "<h2>Панель администратора сайта</h2>";
			echo "<p>Вы вошли как '$login' | <a href='exit.php'>Выход</a></p>";
		?>	                   
			<h2>Справочники сайта</h2>
			<div class="product_box margin_r24">
			<a href="" target="_parent"><img src="images/catalog.jpg" alt="product" /></a>
			<h3>Каталог товаров</h3>                        							
			<a href="catalogs.php">Просмотр</a> 
			</div>                   
			<div class="product_box">
			<a href="" target="_parent"><img src="images/orders.jpg" alt="product" /></a>
			<h3>Заказы</h3>							
			<a href="orders.php">Просмотр</a>
			</div>
		<?php						
		}?>									
	</div></div></div></div> 
<?    
ShowNews();
ShowFooter();
?>
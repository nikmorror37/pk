<?php
/*Запускаем сессию*/
session_start();
/*Подключаем библиотеки*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
header("Content-Type: text/html; charset=utf-8");

/*Получаем данные из формы*/
$login = clearData($_POST["login"], "string_file");
$password = clearData($_POST["password"], "string_file");

/*Вызываем функцию enter() из нашей библиотеке функций (shop_lib.inc.php) 
для проверки регистрации данного пользователя*/
$resulte = enter($login, $password);

ShowHeader();
ShowMenu(current,'','','','');
ShowLeftSidebar();
?>            
    <div class="content_section">    
    <h2>Авторизация на сайте!</h2> 
	<? echo "<p>$resulte</p>"?>
	<p>Войти в <a href='enterform.php'>Панель администратора</a></a></p>					
    </div></div></div></div>
<?
ShowNews();
ShowFooter();
?>
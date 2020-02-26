<?php
/*Запускаем сессию*/
session_start();
/*Подключаем библиотеки*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
header("Content-Type: text/html; charset=utf-8");

/*Получаем данные из формы*/
$fio = clearData($_POST["name"], "string_file");
$email = clearData($_POST["email"], "string_file");
$phone = clearData($_POST["phone"], "string_file");
$address = clearData($_POST["address"], "string_file");
$customer = session_id();
$datetime = date('Y:m:d G:i:s');

/*Составляем строку, которая будет записываться в файл. Это данные пользователя, оформившего заказ*/
$order = "$fio|$email|$phone|$address|$customer|$datetime\n";
/*Записываем строку в файл*/
file_put_contents(ORDERS_LOG, $order, FILE_APPEND);
/*Вызываем функцию resave() из нашей библиотеке функций (shop_lib.inc.php) 
для пересохранения купленных товаров из корзины в таблицу orders.*/
resave($fio, $email, $phone, $address, $customer, $datetime);

ShowHeader();
ShowMenu(current,'','','','');
ShowLeftSidebar();
?>           
    <div class="content_section">    
    <h2>Оформление заказа</h2>                   
    </div>			
    <div class="content_section">  
	<p>Ваш заказ принят.</p>
	<p>Вернитесь в <a href='products.php'>каталог товаров</a></a></p>		
	</div></div></div></div>
<?
ShowNews();
ShowFooter();
?>
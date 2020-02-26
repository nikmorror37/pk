<?php
/*Запускаем сессию*/
session_start();
/*Подключяем библиотеки*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
 
/*Получаем идентификатор пользователя*/
$customer = session_id();
/*Получаем id товара*/
$goodsid = clearData($_GET["id"], "i");
/*Получаем время*/
$datetime = date('Y:m:d G:i:s');
 
add2basket($customer, $goodsid, $datetime);
header("Location: basket.php");
?>

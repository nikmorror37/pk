<?php
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
/*Получаем и фильтруем данные из формы. Функция clearData () находится в библиотеке функций shop_lib.inc.php */
$type = clearData($_POST['type'], "i");
$article = clearData($_POST['article']);
$name = clearData($_POST['name']);
$note = clearData($_POST['note']);
$amount = clearData($_POST['amount'], "i");
$price = clearData($_POST['price'], "i"); 
$discount = clearData($_POST['discount'], "i");

/*Сохранение нового товара в базе данных. Функция save () находится в библиотеке функций eshop_lib.inc.php */
saveCatalog($type, $article, $name, $note,  $amount, $price, $discount);
/*Переадресовываем пользователя на страницу добавления товара*/
header("Location: catalogs.php");
?>

<?php
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
/*Получаем и фильтруем данные из формы. 
Функция clearData () находится в библиотеке функций shop_lib.inc.php */
$id = clearData($_POST['id'], "i");
$type = clearData($_POST['type'], "i");
$article = clearData($_POST['article']);
$name = clearData($_POST['name']);
$note = clearData($_POST['note']);
$price = clearData($_POST['price'], "i"); 
$amount = clearData($_POST['amount'], "i"); 
$discount = clearData($_POST['discount'], "i");

/*Сохранение изменения товара в базе данных. 
Функция editCatalog() находится в библиотеке функций eshop_lib.inc.php */
editCatalog($id, $type, $article, $name, $note, $amount, $price, $discount);
/*Переадресовываем пользователя на страницу добавления товара*/
header("Location: catalogforme.php?id=".$id.".php");
?>

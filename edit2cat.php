<?php
/*����������� ���������*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
/*�������� � ��������� ������ �� �����. 
������� clearData () ��������� � ���������� ������� shop_lib.inc.php */
$id = clearData($_POST['id'], "i");
$type = clearData($_POST['type'], "i");
$article = clearData($_POST['article']);
$name = clearData($_POST['name']);
$note = clearData($_POST['note']);
$price = clearData($_POST['price'], "i"); 
$amount = clearData($_POST['amount'], "i"); 
$discount = clearData($_POST['discount'], "i");

/*���������� ��������� ������ � ���� ������. 
������� editCatalog() ��������� � ���������� ������� eshop_lib.inc.php */
editCatalog($id, $type, $article, $name, $note, $amount, $price, $discount);
/*���������������� ������������ �� �������� ���������� ������*/
header("Location: catalogforme.php?id=".$id.".php");
?>

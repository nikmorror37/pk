<?php
/*����������� ���������*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
/*�������� � ��������� ������ �� �����. ������� clearData () ��������� � ���������� ������� shop_lib.inc.php */
$type = clearData($_POST['type'], "i");
$article = clearData($_POST['article']);
$name = clearData($_POST['name']);
$note = clearData($_POST['note']);
$amount = clearData($_POST['amount'], "i");
$price = clearData($_POST['price'], "i"); 
$discount = clearData($_POST['discount'], "i");

/*���������� ������ ������ � ���� ������. ������� save () ��������� � ���������� ������� eshop_lib.inc.php */
saveCatalog($type, $article, $name, $note,  $amount, $price, $discount);
/*���������������� ������������ �� �������� ���������� ������*/
header("Location: catalogs.php");
?>

<?php
/*��������� ������*/
session_start();
/*���������� ����������*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
 
/*�������� ������������� ������������*/
$customer = session_id();
/*�������� id ������*/
$goodsid = clearData($_GET["id"], "i");
/*�������� �����*/
$datetime = date('Y:m:d G:i:s');
 
add2basket($customer, $goodsid, $datetime);
header("Location: basket.php");
?>

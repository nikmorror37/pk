<?php
/*��������� ������*/
session_start();
/*���������� ����������*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
 
$id = clearData($_GET["id"], "i");
editOrder($id);
header("Location: orders.php");
?>

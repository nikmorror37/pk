<?php
/*��������� ������*/
session_start();
/*���������� ����������*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
 
$id = clearData($_GET["id"], "i");
basketDel($id);
header("Location: basket.php");
?>

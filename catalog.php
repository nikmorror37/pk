<?php
/*Запускаем сессию*/
session_start();
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
/*Получаем id категорию товара*/
$typegoodsid = clearData($_GET["id"], "i");
header("Content-Type: text/html; charset=utf-8");

ShowHeader();
ShowMenu('',current,'','','');
ShowLeftSidebar();
ShowProducts($typegoodsid);
ShowNews();
ShowFooter();
?>
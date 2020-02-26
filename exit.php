<?php 
/*Запускаем сессию*/
session_start();
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";

unset($_SESSION['password']);
unset($_SESSION['login']); 
unset($_SESSION['id']);
echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";	
?>
<?php
/*Запускаем сессию*/
session_start();
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
header("Content-Type: text/html; charset=utf-8");

ShowHeader();
ShowMenu('',current,'','','');
ShowLeftSidebar();
?>                         
    <div class="content_section">    
    <h2>Категории товаров магазина!</h2>                    
    <p>В данном разделе представлены товары по категориям.</p>                    
    </div>
<?
ShowContentProducts();
ShowNews();
ShowFooter();
?>
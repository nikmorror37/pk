<?php
/*подключение библиотек*/
require "shop_db.inc.php";
require "shop_lib.inc.php";
header("Content-Type: text/html; charset=utf-8");

ShowHeader();
ShowMenu(current,'','','','');
ShowLeftSidebar();
?>                       
    <div class="content_section">    
     <h2>Добро пожаловать в магазин компьютерной техники!</h2>                    
	<p>Наша Компания  специализируется на оптовой и розничной продаже компьютерной техники как для дома, так и для офиса, а также различных запчастей для ремонта оргтехники.</p>
	<p>На данный момент мы представляем собой компанию, владеющую сетью магазинов и имеющую в своей сети собственный склад c постоянным наличием необходимого запаса товаров.</p>
	<p>За это время у нас сложились партнерские отношения с ведущими производителями, позволяющие предлагать высококачественную продукцию по конкурентоспособным ценам.</p>                    
	</div>  
<?
ShowContentProducts();
ShowNews();
ShowFooter();
?>
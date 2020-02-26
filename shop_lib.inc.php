<?php
header("Content-Type: text/html; charset=utf-8");

/*---Фильтрация полученных данных---*/
function clearData($data, $type = "s")
{
    switch($type)
	{
        case "s": return mysql_real_escape_string(trim(strip_tags($data))); break;
        case "i": return (int)$data;
    
	    /*Для фильтрации данных пользователя, который оформил заказ и эти данные уходят в файл*/
        case "string_file": return trim(strip_tags($data));
    }
}
//------------------ПОСТРОЕНИЕ КОНТЕНТА СТРАНИЦ--------------------------------------
function ShowHeader()
{
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
	<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Интернет магазин ПК</title>
	<meta name='keywords' content='Магазин компьютерной техники, оргтехники' />
	<meta name='description' content='Интернет магазин компьютерной техники, оргтехники' />
	<link href='PK_style.css' rel='stylesheet' type='text/css' />
	<link rel='stylesheet' type='text/css' href='stylesheet/styles.css' />
	</head>
	<body>
	<div id='wrapper'>
	<div id='main_column'>    
    	<div id='header'>        
       		<div id='site_title'>			
				<table width='100%' height='100%'>
				<tr>
                <td><h1><a href='enterform.php' target='_parent'>
                	<img src='images/logo.jpg' alt='ПК' />
                    <span>Интернет магазин компьютеров</span>
                </a></h1></td>
				</tr>
				</table>
            </div>        
        </div>";
}

function ShowMenu($id1,$id2,$id3,$id4,$id5)
{
	echo "<div id='menu'>        
            <ul>
                <li><a href='index.php' class='".$id1."'><span></span>Главная</a></li>
                <li><a href='products.php' class='".$id2."' target='_parent'><span></span>Товары магазина</a></li>
                <li><a href='discount.php' class='".$id3."' target='_parent'><span></span>Акции и скидки</a></li>
                <li><a href='about.php' class='".$id4."' target='_parent'><span></span>О нас</a></li>
                <li><a href='contacts.php' class='".$id5."' target='_parent'><span></span>Наши контакты</a></li>
            </ul>        
        </div>
		<div id='content_column'>";
}

function ShowLeftSidebar()
{
	global $link;
	echo "<div id='left_sidebar'>
			<span class='top'></span><span class='bottom'></span>            
            	<div class='left_sidebar_section'>            
                    <h2>Категории товаров</h2>                    
                    <ul class='categories_list'>";				
	$ql = 'SELECT * FROM `type` order by type';		
	$r = mysqli_query($link, $ql);						
	while ($row = mysqli_fetch_array($r, MYSQL_ASSOC)) 						
	echo "<li><a href='catalog.php?id=".$row[id].".php'>$row[type]</a></li>";
    echo "</ul></div><div class='left_sidebar_section'>                
            <h2>Самое выгодное предложение</h2>                    
            <div class='product_box margin_r24'>";					
	$ql = 'SELECT * FROM `catalog` where `discount`>0 order by discount desc';						
	$r = mysqli_query($link, $ql);						
	$ii=0;
	while ($row = mysqli_fetch_array($r, MYSQL_ASSOC)) 
	{
		if ($ii==0) $disc=$row[discount];
		$ii++;
		echo "<li><a href='discount.php'>$row[name]</a></li>
		<a href='discount.php'><img src='images/catalog/".$row[id].".jpg' alt='product'/></a>";
		if ($ii>3) break;							
	}							
    echo "</div><p>Успевайте приобрести товары по выгодным ценам!</p>                    
    <div class='discount'><span>от ".$disc."% скидки</span> | <a href='discount.php'>Подробнее</a></div>
    </div></div><div id='content'>";
}

function ShowNews()
{
	global $link;
	echo "<div id='right_sidebar'><span class='top'></span><span class='bottom'></span>              
        <div class='right_sidebar_section'>       
        	<h2>Последние новости</h2>";   	
	$ql = "SELECT * FROM `news` ORDER BY `period` DESC";						
	$r = mysqli_query($link, $ql);
	$i = 0;
	while ($row = mysqli_fetch_array($r, MYSQL_ASSOC)) 
	{
		echo "<div class='news_section'><h3>$row[period] - $row[header]</h3>
		<p>$row[text]</p></div>";
		$i++;
		if ($i == 5) break;
	}					
	echo "</div></div></div>";
}

function ShowFooter()
{
	echo "<div id='footer_wrapper'>
	<div id='footer'>    
    <ul class='footer_menu'>
            <li><a href='index.php'>Главная</a></li>
            <li><a href='products.php'>Товары магазина</a></li>
            <li><a href='discount.php'>Акции и скидки</a></li>
            <li><a href='about.php'>О нас</a></li>
            <li><a href='contacts.php'>Наши контакты</a></li>        
        </ul>
        Copyright© 2020 <a href='index.php'>Магазин компьютерной техники</a> | 
        Создан в качестве проекта по дисциплине PWeb-прМС 
    </div> 
	</div></body></html>";	
}

function ShowContentProducts()
{
	global $link;
	echo "<div class='content_section'>";                
	$goods = selecttypeAll();
	$ii = 0;				
	foreach($goods as $item){				
		if ($ii%2 == 0) 
			echo "<div class='product_box margin_r24'>";
		else 	
		echo "<div class='product_box'>";
		echo "<a href='catalog.php?id=".$item['id']."' target='_parent'><img src='images/type/".$item['id'].".jpg' alt='product' /></a>
		<h3>".$item['type']."</h3>
		<a href='catalog.php?id=".$item['id']."'>Подробнее</a>
		</div>";				
		$ii++;
	}					
    echo "</div></div></div></div> ";	
}

function ShowProductsD()
{
	global $link;
	echo "<a href='basket.php'>Корзина</a><div class='content_section'>    
    <h2>Товары компьютерного магазина</h2></div>				
    <div class='content_section'>  
	<table border='0' cellpadding='0' cellspacing='0' width='100%'>";								               	                  
	$goods = selectAlldiscount();					
	foreach($goods as $item){				
		echo "<tr><td><div class='product_box margin_r24'>
		<a href='' target='_parent'><img src='images/catalog/".$item['id'].".jpg' alt='product' /></a>
		<h3>".$item['name']."</h3>";														
		if ($item['discount'] <> 0){
			echo "<h4>Скидка : ".$item['discount']." %</h4>";
		} 
		echo "<a href='add2basket.php?id=".$item['id']."'>В корзину</a> 							
		</div></td>	
		<td valign='top'>Артикул: ".$item['article']."<br><br>".$item['note']."><br>
		<h4>Количество: ".$item['amount']." шт.<br>Цена: ".$item['price']." р.</h4></td></tr>";										
		$ii++;
	}
	echo "</table></div></div></div></div>"; 
}

function ShowProducts($typegoodsid)
{
	global $link;
	echo "<a href='basket.php'>Корзина</a><div class='content_section'>    
    <h2>Товары компьютерного магазина</h2></div>    	
    <div class='content_section'>  
	<table border='0' cellpadding='0' cellspacing='0' width='100%'>";								               	                  
	$goods = selectAll($typegoodsid);					
	foreach($goods as $item){				
		echo "<tr><td><div class='product_box margin_r24'>
		<a href='' target='_parent'><img src='images/catalog/".$item['id'].".jpg' alt='product' /></a>
		<h3>".$item['name']."</h3>";														
		if ($item['discount'] <> 0){
			echo "<h4>Скидка : ".$item['discount']." %</h4>";
		} 
		echo "<a href='add2basket.php?id=".$item['id']."'>В корзину</a> 							
		</div></td>	
		<td valign='top'>Артикул: ".$item['article']."<br><br>".$item['note']."><br>
		<h4>Количество: ".$item['amount']." шт.<br>Цена: ".$item['price']." р.</h4></td></tr>";										
		$ii++;
	}
	echo "</table></div></div></div></div>"; 
}

//------------------РАБОТА С БАЗОЙ ДАННЫХ--------------------------------------------
/*---Возвращение каталога товаров по выбранной категории---*/
function selectAll($typeid)
{
	global $link;
    $sql = "SELECT * FROM catalog WHERE typeid=$typeid";
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}

/*---Возвращение каталога товаров по группам---*/
function selectAllByGroup()
{
	global $link;
    $sql = "SELECT * FROM catalog";
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}

/*---Возвращение каталога товаров со скидкой---*/
function selectAlldiscount()
{
	global $link;
    $sql = "SELECT * FROM catalog WHERE discount>0";
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}

/*---Возвращение всех типов товаров---*/
function selecttypeAll()
{
	global $link;
    $sql = "SELECT * FROM type";
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}
 
/*---Переводим данные в массив---*/
function dataBaseToArray($resultat)
{

    $array = array();
    while($row = mysqli_fetch_assoc($resultat))
	{
        $array[] = $row;
    }
    return $array;
}
 
/*---Добавляем товары в корзину---*/
function add2basket($customer, $goodsid, $datetime)
{    
	global $link;
	$quantity = 1;
	$sql = "SELECT id, quantity  
			FROM basket
            WHERE customer='$customer' AND catalogid=$goodsid";
	
	$resultat = mysqli_query($link, $sql) or die(mysql_error());	
	$goods = dataBaseToArray($resultat);
		
	if(mysqli_num_rows($resultat) > 0)
	{
		foreach($goods as $item){		
			$quantity = $item["quantity"] + 1;
			
			$sql = "UPDATE basket
				SET            
				quantity=$quantity,            
				datetime='$datetime'
			WHERE
				customer='$customer' AND
				catalogid=$goodsid";
			}
	}
	else 
	{		
		$sql = "INSERT INTO basket( 
			customer,
            catalogid,			
            quantity,
            datetime)
        VALUES(
            '$customer',
            $goodsid,			
            $quantity,
            '$datetime'
        )";
	}	

    mysqli_query($link, $sql) or die(mysql_error());
}
 
/*---Возвращаем всю пользовательскую корзину---*/
function myBasket(){
	global $link;
    $sql = "SELECT
                catalogid,
				article,
                name,
                price,
                discount,
                basket.id,                
                customer,
                quantity
            FROM catalog, basket
            WHERE customer='".session_id()."'
            AND catalog.id=basket.catalogid";
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}
 
/*---Удаление данных из корзины---*/
function basketDel($id){
	global $link;
    $sql = "DELETE FROM basket WHERE id=$id";
    mysqli_query($link, $sql) or die(mysql_error());
}

/*---Удаление данных из каталога---*/
function catalogDel($id){
	global $link;
    $sql = "DELETE FROM catalog WHERE id=$id";
    mysqli_query($link, $sql) or die(mysql_error());
}
 
/*---Пересохранение товаров из корзины в заказы---*/
function resave($fio, $email, $phone, $address, $customer, $datetime){    
	global $link;
    /*Добавляем шапку заказа*/
	$sql = "INSERT INTO orders(
            datetime,
			fio,
            email,
            phone,
            address,
            customer
            )
        VALUES(
            '$datetime',
			'$fio',
            '$email',
            '$phone',
            '$address',
            '$customer'
            )";
	mysqli_query($link, $sql) or die(mysql_error());
	// Определяем идентификатор последней добавленной записи в этой таблице 
	$latest_id = mysqli_insert_id($link);
	
	$goods = myBasket();
	foreach($goods as $item)
	{
        $sql = "INSERT INTO orderst(
                orderid,
                goodsid,
                quantity)
            VALUES(
                $latest_id ,
                '$item[catalogid]',
                '$item[quantity]')";
		mysqli_query($link, $sql) or die(mysql_error());
	}

	/*Запрос на удаление товаров из корзины*/
	$sql = "DELETE FROM basket WHERE customer='".session_id()."'";

	mysqli_query($link, $sql) or die(mysql_error());
}

/*---Получение информации о заказах---*/
function getOrders()
{

	global $link;
    $sql = "SELECT * FROM orders";
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}

/*---Получение информации о купленных товарах в заказах---*/
function getOrdersT($orderid)
{
	global $link;
    $sql = "SELECT * FROM orderst, catalog 
			WHERE 
            catalog.id = orderst.goodsid AND
			orderid=$orderid";
			
    $resultat = mysqli_query($link, $sql) or die(mysql_error());
    return dataBaseToArray($resultat);
}

/*---Авторизация пользователя в панели администратора сайта---*/
function enter($login, $password)
{
	global $link;
	$resultat = '';
	if ($login == '') 
	{
		unset($login);
		$resultat = '<br>Введите пожалуйста логин!';
	}
	else
	{
		if ($password == '') 
		{
			unset($password);
			$resultat = '<br>Введите пароль!';
		}
		else
		{
			$login = stripslashes($login);
			$login = htmlspecialchars($login);
			$password = stripslashes($password);
			$password = htmlspecialchars($password);
			
			$login = trim($login);
			$password = trim($password);
			$q = "SELECT  * FROM  registration WHERE  login = '$login' AND  password = '$password'";
			$user = mysqli_query($link, $q);;
			$id_user = mysqli_fetch_array($user, MYSQL_ASSOC);
			$password = md5($password);
				
			if (empty($id_user['id']))
			{
				$resultat = '<br>Извините, введённый вами логин или пароль неверный.<br>Вход в систему невозможен!';
			}
			else 
			{
				$_SESSION['password'] = $password; 
				$_SESSION['login'] = $login; 
				$_SESSION['id'] = $id_user['Key'];	
				$resultat = '<br>Вы успешно прошли авторизацию!';				
			}
		}
	}
	return $resultat;
}

/*---Изменение статуса заказа---*/
function editOrder($id){
	global $link;
    $sql = "SELECT * FROM orders WHERE id=$id";
	$resultat = mysqli_query($link, $sql) or die(mysql_error());
	$resultat = dataBaseToArray($resultat);
	foreach($resultat as $order)
		$V = $order["V"];
	
	if ($V == 0) 
		$V = 1;
	else $V = 0;
		
	$sql = "UPDATE orders
			SET V = $V 
			WHERE id=$id";
	mysqli_query($link, $sql) or die(mysql_error());    
}

/*Сохраняет новый товар в таблицу catalog*/
function saveCatalog($type, $article, $name, $note, $amount, $price, $discount)
{
	global $link;
    $sql = "INSERT INTO catalog(typeid,
                article,
                name,
				note,
				amount,
				price,
                discount)
            VALUES(
                $type,
				'$article',
                '$name',
				'$note',
				$amount,
                $price,
                $discount)";
	mysqli_query($link, $sql) or die(mysql_error());
	
	// Определяем идентификатор последней добавленной записи и копируем картинку
	$myfile = $_FILES["myfile"]["tmp_name"];
	$dir = 'images/catalog/';	
	$latest_id = mysql_insert_id();
	$namepict = $dir.$latest_id.".jpg";
	$copy = copy($myfile, $namepict);
}	

/*Сохраняет изменения в товар в таблицу catalog*/
function editCatalog($id, $type, $article, $name, $note, $amount, $price, $discount)
{
	global $link;
    $sql = "UPDATE catalog
				SET
				typeid=$type,
                article='$article',
                name='$name',
				note='$note',
				amount=$amount,
				price=$price,
                discount=$discount
            WHERE id=$id";
	mysqli_query($link, $sql) or die(mysql_error());
}	
?>

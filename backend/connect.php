<?php	// подключение к базе
 // определяем начальные данные
    $db_host = 'localhost';
    $db_name = 'tezmo_velomarket';
    $db_user = 'tezmo';
    $db_pass = 'pass';
	$db_charset = 'utf8';
 // поключение
	$connection = mysql_connect($db_host, $db_user, $db_pass) or die("Could not connect: " . mysql_error());
	mysql_query('SET NAMES utf8');
	$select_db = mysql_select_db($db_name) or die ("Base not choose");; //бывает необходимость вторым аргументом указать соединение mysql_connect.
?>
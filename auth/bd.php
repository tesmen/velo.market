<?php
$db_host = 'localhost';
$db_user = 'tezmo';
$db_pass = 'pass';
$db_name = 'tezmo_velomarket';

$mysql_c = mysql_connect($db_host, $db_user, $db_pass) or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $mysql_c);
$query = sprintf("SELECT %s FROM %s",
    mysql_real_escape_string('*'),
    mysql_real_escape_string('users'));
$result = mysql_query($query);
echo 'Запрос выполнен: ' . $query . '<br>';
if (!$result) {
    $message  = 'Неверный запрос: ' . mysql_error() . "\n";
    $message .= 'Запрос целиком: ' . $query;
    die($message);
}

$array =  mysql_fetch_array($result);
echo '1: ' . $array[0];
echo '2: ' . $array[1];
echo '3: ' . $array[2];
echo "<BR>";

$array =  mysql_fetch_assoc($result);
echo 'id: ' . $array['id'];
echo 'login: ' . $array['login'];
echo 'pass: ' . $array['password'];
echo "<BR>";

?>

<!--
$query = sprintf("SELECT firstname, lastname, address, age FROM friends 
    WHERE firstname='%s' AND lastname='%s'",
    mysql_real_escape_string($db_user),
    mysql_real_escape_string($db_pass));
echo $query;



foreach($array as $value) {
	echo $value;
}

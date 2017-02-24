<center><h3>Пользователи, таблица USERS</h3></center>

<? 
$query = sprintf("SELECT * FROM users");
echo $query . "	 . . . . .  ";
$result = mysql_query($query);
echo 'Записей: ' . mysql_num_rows($result);

while($array = mysql_fetch_assoc($result)){
	echo sprintf("<a class='tbl_row' href='#' >%s - %s - %s</a>",
	$array['id'], $array['login'], 'vk: ' . $array['vk_first_name'] );
}
?>

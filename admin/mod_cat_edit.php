<? 
if (!empty($_POST['cat_name'])){
	$query = sprintf("UPDATE `cats` SET  `name` =  '%s' WHERE  `id` = %s;", $_POST['cat_name'], $_POST['cat_id']);
	echo $query . "	 . . . . .  <br>";
	$result = mysql_query($query);
	if ($result) {echo "Сохранено!<br>";} else {echo "Ошибка при сохранении!" . mysql_error;}
	unset($_POST['cat_name']);
	unset($query);
	unset($result);
	
}


$query = sprintf("SELECT * FROM %s WHERE id=%s", 'cats', $_GET['cat_id']);
echo $query . "	 . . . . .  ";
$result = mysql_query($query);
$array = mysql_fetch_array($result)

?>

<form action="#" method="post">
	<input type=text value="<? echo $array[0] ?>"  length=3 disabled />
	<input type=hidden value="<? echo $array[0] ?>" name="cat_id" />
	<input type=text value="<? echo $array[1] ?>" name="cat_name" length=32 />
	<input type=submit value="Сохранить">
</form>
<!--
<form action="mod_subcat_new.php" method="post">
	<input type=text name="subcat_name" length=32 />
	<input type=hidden name="cat_id" value=<?echo $_GET['cat_id']?>> 	</input>
	<input type=submit value="Добавить подкатегорию">
</form>
-->
<? 
$tb = "subcats";
$query = sprintf("SELECT * FROM %s WHERE `cat_id` = '%s' ", $tb,  $_GET['cat_id']);
$result = mysql_query($query);
echo $query . "	 . . . . .  ";
echo 'Записей: ' . mysql_num_rows($result);
while($array = mysql_fetch_array($result)){
	echo sprintf("<a class='tbl_row' href='?mod=subcat_edit.php&subcat_id=%s' >%s - %s - %s</a>",
	$array[0], $array[0], $array[2], $array[1] );
}
?>


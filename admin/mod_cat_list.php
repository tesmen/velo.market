<center><h3>Категории, таблица CATS</h3></center>
<form action="mod_cat_new.php" method="post">
	<input type=text name="cat_name" length=32 />
	<input type=submit value="Добавить">
</form>



<? 
$query = sprintf("SELECT * FROM cats");
echo $query . "	 . . . . .  ";
$result = mysql_query($query);
echo 'Записей: ' . mysql_num_rows($result);

while($array = mysql_fetch_array($result)){
	echo sprintf("<a class='tbl_row' href='?mod=cat_edit.php&cat_id=%s' >%s - %s</a>",
	$array[0], $array[0], $array[1] );
}
?>

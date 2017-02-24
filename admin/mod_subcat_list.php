<center><h3>ПодКатегории, таблица SUBCATS</h3></center>
<form action="mod_subcat_new.php" method="post">
	<input type=text name="subcat_name" length=32 />
	<select name=cat_id> 
		<? //getCat
		$query = sprintf("SELECT * FROM cats");
		$result = mysql_query($query);
		while($array = mysql_fetch_array($result)){
			echo sprintf("<option value='%s'>%s</option>", $array[0], $array[1] );
		}
		unset($query); unset($result);
		?>
	</select>
	<input type=submit value="Добавить">
</form>

<? 
$tb = "subcats";
$view = "subcat_id";
$query = sprintf("SELECT * FROM %s", $tb );
$result = mysql_query($query);
echo $query . "	 . . . . .  ";
echo 'Записей: ' . mysql_num_rows($result);
while($array = mysql_fetch_array($result)){
	echo sprintf("<a class='tbl_row' href='?mod=subcat_edit.php&subcat_id=%s' >%s - %s - %s</a>",
	$array[0], $array[0], $array[2], $array[1] );
}
?>


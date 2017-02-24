<? 
$cat_query = sprintf("SELECT * FROM %s", 'cats');
echo $cat_query . "	 . . . . .  ";
$cat_result = mysql_query($cat_query);
echo 'Записей CATS: ' . mysql_num_rows($cat_result) . "<br>";
while($cat_array = mysql_fetch_array($cat_result)){
	echo sprintf("<ul class='ul-treefree'><a href='?mod=cat_edit.php&cat_id=%s'>%s - %s</a> ", $cat_array[0], $cat_array[0], $cat_array[1] );
	
	$subcat_query = sprintf("SELECT * FROM subcats WHERE cat_id=%s", $cat_array[0]);
	$subcat_result = mysql_query($subcat_query);
	while($subcat_array = mysql_fetch_array($subcat_result)){
		echo sprintf("<li><a href='?mod=subcat_edit.php&subcat_id=%s'>%s - %s</a></li>", $subcat_array[0], $subcat_array[0], $subcat_array[1] );
	}
	
	echo "</ul>";
}
?>

<? 
if (!empty($_POST['subcat_name'])){
	$query = sprintf("UPDATE `subcats` SET  `name` =  '%s', `cat_id` = '%s' WHERE  `id` ='%s' ", $_POST['subcat_name'], $_POST['cat_id'], $_POST['subcat_id']);
	echo $query . "	 . . . . .  <br>";
	$result = mysql_query($query);
	if ($result) {echo "Сохранено!<br>";} else {echo "Ошибка при сохранении!" . mysql_error;}
	unset($_POST['cat_name']);
	unset($query);
	unset($result);
	
}

//UPDATE  `tezmo_velomarket`.`subcats` SET  `name` =  'Бонки1', `cat_id` =  '3' WHERE  `subcats`.`id` =8;

$query = sprintf("SELECT * FROM %s WHERE id=%s", 'subcats', $_GET['subcat_id']);
echo $query . "	 . . . . .  ";
$result = mysql_query($query);
$array = mysql_fetch_array($result);
$cat_id = $array[2];
?>

<form action="#" method="post" >
	<input type=text value="<? echo $array[1] ?>" name="subcat_name" length=32 />
	<input type=text value="<? echo $array[0] ?>"  length=3 disabled />
	<input type=hidden value="<? echo $array[0] ?>" name="subcat_id" />
	<select name="cat_id"> 
		<? //getCat
		$query = sprintf("SELECT * FROM cats");
		$result = mysql_query($query);
		while($array = mysql_fetch_array($result)){
			if($array[0] == $cat_id) {$selected = 'selected';} else {$selected = '';}
			echo sprintf("<option value='%s' %s>%s</option>", $array[0], $selected, $array[1] );
		}
		unset($query); unset($result);
		?>
	</select>
	<input type=submit value="Сохранить">
	
	
</form>
 
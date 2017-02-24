<? 
//UPDATE  `tezmo_velomarket`.`subcats` SET  `name` =  'Бонки1', `cat_id` =  '3' WHERE  `subcats`.`id` =8;

$subcat_id = $_GET['subcat_id'];
$cat_list = tb2arr('cats', null);
$subcat_row = tb_get_row('subcats', 'id=' . $subcat_id);
$cat_id = $subcat_row['cat_id'];


?>

<form action="exec_subcat_update.php" method="post" >
	<input type=text value="<? echo $subcat_row['name'] ?>" name="subcat_name" length=32 />
	<input type=text value="<? echo $subcat_row['id'] ?>"  length=3 disabled />
	<input type=hidden value="<? echo $subcat_row['id'] ?>" name="subcat_id" />
	<select name="cat_id"> 
		<? //getCat
		foreach($cat_list as $arg){
			if($arg[0] == $cat_id) {$selected = 'selected';} else {$selected = '';}
			echo sprintf("<option value='%s' %s>%s</option>",
			$arg[0], $selected, $arg[1] );
		}
		unset($query); unset($result);
		?>
	</select>
	<input type=submit value="Сохранить">

<?	
	echo $_GET["message"];
	echo sprintf("<br><a href='?mod=cat_edit.php&cat_id=%s'>В категорию ( %s )</a>", $cat_id, $cat_list[$cat_id]['name']);
	echo sprintf("<br><a href='?mod=subcat_list.php'>В список подкатегорий</a>", $cat_id);
?>
	
</form>
 
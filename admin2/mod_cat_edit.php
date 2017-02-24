<? //getCat
$cat_row = tb_get_row('cats', 'id=' . $_GET['cat_id']);
$subcat_list = tb2arr('subcats', 'cat_id=' . $_GET['cat_id']);

?>

<center><h3>Категория <? echo $cat_row['name'] ?></h3></center>

<form action="exec_cat_update.php" method="post">
	<input type=text value="<? echo $cat_row[0] ?>"  length=3 disabled />
	<input type=hidden value="<? echo $cat_row[0] ?>" name="cat_id" />
	<input type=text value="<? echo $cat_row[1] ?>" name="cat_name" length=32 />
	<input type=submit value="Сохранить"><?echo $_GET["message"];?>
</form>

<form action="mod_subcat_new.php" method="post">
	<input type=text name="subcat_name" length=32 />
	<input type=hidden name="cat_id" value=<?echo $_GET['cat_id']?>> 	</input>
	<input type=submit value="Добавить подкатегорию">
</form>



<center><h3>Подкатегорий: <? echo count($subcat_list); ?></h3></center>
<table class="table table-bordered table-hover table-condensed">
<thead>
<tr><td>#</td><td>id</td><td>name</td></tr>
</thead>
<tfoot>
<tr><td>#</td><td>id</td><td>name</td></tr>
</tfoot>
<tbody>
<? 
$counter=1;
foreach($subcat_list as $arg){
	echo sprintf("
		<tr>
		<td>%s</td>
		<td>%s</td>
		<td><a href='?mod=subcat_edit.php&subcat_id=%s' >%s</a></td>
		</tr>",
		$counter++, $arg['id'], $arg['id'], $arg['name']
	);
}
?>
</tbody>
</table>
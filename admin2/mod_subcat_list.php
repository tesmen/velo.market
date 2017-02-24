<center><h3>ПодКатегории, таблица SUBCATS</h3></center>
<?
echo $_GET['message'];
$cat_list = tb2arr('cats', null);
$subcat_list = tb2arr('subcats', null);
?>

<form action="mod_subcat_new.php" method="post">
	<input type=text name="subcat_name" length=32 />
	<select name=cat_id> 
		<? //getCat
		foreach($cat_list as $arg){
			echo sprintf("<option value='%s'>%s</option>",
			$arg['id'], $arg['name'] );
		}
		?>
	</select>
	<input type=submit value="Добавить">
</form>


<table class="table table-bordered table-hover table-condensed">
<thead>
<tr><td>#</td> <td>id</td> <td>cat_id</td> <td>name</td></tr>
</thead>
<tfoot>
<tr><td>#</td> <td>id</td> <td>cat_id</td> <td>name</td></tr>
</tfoot>
<tbody>
<? 

foreach($subcat_list as $arg){
	echo sprintf("
		<tr>
		<td>%s</td>
		<td>%s</td>
		<td>%s - %s</td>
		<td><a href='?mod=subcat_edit.php&subcat_id=%s' >%s</a></td>
		</tr>",
		$arg['index'],
		$arg['id'],
		$arg['cat_id'],	$cat_list[$arg['cat_id']]['name'],
		$arg['id'],
		$arg['name']
	);
}
?>
</tbody>
</table>

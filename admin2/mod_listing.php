<? //getCatList
$tb='users';
$tb_array = tb2arr($tb, null);
$tb_array_rows = count($tb_array); 
$tb_array_cols = count($tb_array[42]); 

//print_r($tb_array);
echo 'B'.$tb_array_cols;
echo 'A'.$tb_array_rows;
?>


<center><h3>Listing, таблица <? echo $tb." (", count($tb_array)?> записей)</h3></center>
<?
echo $_GET['message'];
?>
<!--
<form action="mod_cat_new.php" method="post">
	<input type=text name="cat_name" length=32 />
	<input type=submit value="Добавить">
</form>
-->
 
<table class="table table-bordered table-hover table-condensed">
<thead>
<tr><td>#</td><td>id</td><td>name</td></tr>
</thead>
<tfoot>
<tr><td>#</td><td>id</td><td>name</td></tr>
</tfoot>
<tbody>
<? 
$index = 1;
foreach($tb_array as $arg){
	echo sprintf("
		<tr>
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		</tr>",
		$index++, $arg['id'], $arg['login'], $arg['vk_first_name'], $arg['vk_bdate']
	);
}
?>
</tbody>
</table>
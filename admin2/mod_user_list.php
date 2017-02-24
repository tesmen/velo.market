<? //getCatList
$tb='users';
$user_list = tb2arr($tb, null);
?>


<center><h3>Категории, таблица <? echo $tb." (", count($user_list)?> записей)</h3></center>
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
foreach($user_list as $arg){
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
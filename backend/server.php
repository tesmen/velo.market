<?echo __DIR__;?>

<table width=600>
<caption>$_SERVER</caption>
<thead>
	<tr bgcolor="#cfcfcf"><td>Parameter</td><td>Value</td></tr>
</thead>
<?
foreach ($_SERVER as $param => $value){
	echo '<tr><td>' . $param .'</td><td> '.  $value . '</td></tr>';
}
?>
</table><br><br>

<table width=600>
<caption>$_ENV</caption>
<thead>
	<tr bgcolor="#cfcfcf"><td>Parameter</td><td>Value</td></tr>
</thead>
<?
foreach ($_ENV as  $value){
	echo '<tr><td>' . '</td><td> '.  $value . '</td></tr>';
}
?>
</table><br><br>

<table width=600>
<caption>$_FILES</caption>
<thead>
	<tr bgcolor="#cfcfcf"><td>Parameter</td><td>Value</td></tr>
</thead>
<?
foreach ($_FILES as $param => $value){
	echo '<tr><td>' . $param .'</td><td> '.  $value . '</td></tr>';
}
?>
</table><br><br>

<table width=600>
<caption>$_COOKIE</caption>
<thead>
	<tr bgcolor="#cfcfcf"><td>Parameter</td><td>Value</td></tr>
</thead>
<?
foreach ($_COOKIE as $param => $value){
	echo '<tr><td>' . $param .'</td><td> '.  $value . '</td></tr>';
}
?>
</table><br><br>
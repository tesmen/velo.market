<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/connect.php';

if (!empty($_POST['subcat_name'])){
	$query = sprintf("UPDATE `subcats` SET  `name` =  '%s', `cat_id` = '%s' WHERE  `id` ='%s' ", $_POST['subcat_name'], $_POST['cat_id'], $_POST['subcat_id']);
	echo $query . "	 . . . . .  <br>";
	$result = mysql_query($query);
	if ($result) {
		$message = "Сохранено!<br>";
		} else {
		$message = "Ошибка при сохранении!" . mysql_error;
	}
	
}
header(sprintf("location: %s&message=%s",
	$_SESSION['current_page'], $message )
);
?>
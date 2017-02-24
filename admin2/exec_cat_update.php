<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/connect.php';

if (!empty($_POST['cat_name'])){
	$query = sprintf("UPDATE `cats` SET  `name` =  '%s' WHERE  `id` = %s;", $_POST['cat_name'], $_POST['cat_id']);
	echo $query . "	 . . . . .  <br>";
	$result = mysql_query($query);
	if ($result) {
		$message = "Сохранено! " . $_POST['cat_name'];
		} else {
		$message = "Ошибка при сохранении!" . mysql_error;
	}
}
header(sprintf("location: %s&message=%s",
	$_SESSION['current_page'], $message )
);
?>
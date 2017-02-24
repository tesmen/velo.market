<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/connect.php';

if ($_POST['cat_name']!='') {
$query = sprintf("INSERT INTO `tezmo_velomarket`.`cats` (`id`, `name`) VALUES (NULL, '%s')", $_POST['cat_name']);
$result = mysql_query($query);
if($result) {$message='Запись "' . $_POST['cat_name'] . '" создана';} else {$message = mysql_error;}
//echo $query;
}
header(sprintf("location: %s&message=%s", $_SESSION['current_page'], $message ));
?>

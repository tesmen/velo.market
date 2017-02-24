<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/connect.php';

$query = sprintf("INSERT INTO `tezmo_velomarket`.`subcats` (`id`, `name`, `cat_id`) VALUES (NULL, '%s', '%s')", $_POST['subcat_name'], $_POST['cat_id']);
$result = mysql_query($query);
if($result) {$message='Запись ' . $_POST['subcat_name'] . ' создана';} else {$message = mysql_error;}
//echo $query;
header(sprintf("location: %s&message=%s", $_SESSION['current_page'], $message ));
?>

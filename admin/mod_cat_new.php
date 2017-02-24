<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/connect.php';

$query = sprintf("INSERT INTO `tezmo_velomarket`.`cats` (`id`, `name`) VALUES (NULL, '%s')", $_POST['cat_name']);
$result = mysql_query($query);
if($result) {$message='Запись ' . $_POST['cat_name'] . ' создана';} else {$message = mysql_error;}
//echo $query;
header(sprintf("location: http://velo.market/admin?mod=cat_list.php&message=%s", $message ));
?>

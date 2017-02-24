
<?
    $db_host = 'localhost';
    $db_name = 'tezmo_velomarket';
    $db_user = 'tezmo';
    $db_pass = 'pass';
	$db_charset = 'utf8';
	
$dsn = "mysql:host=$db_host;dbname=$db_name; charset=$db_charset";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
$pdo = new PDO($dsn, $db_user, $db_pass, $opt);
//$pdo -> exec("set names utf8"); //!!important
$stmt = $pdo->query('SELECT name FROM cats');
while ($row = $stmt->fetch())
{
    echo $row['name'] . "<br>";
}



?>

 <?
    $db_host = 'localhost';
    $db_name = 'tezmo_velomarket';
    $db_user = 'tezmo';
    $db_pass = 'pass';
	$db_charset = 'utf8';
 

$user = $_post['username'];
$password = md5($POST['password']);
$array = [$user, md5($password)];

$dsn = "mysql:host=$db_host; dbname=$db_name";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );
$pdo = new PDO($dsn, $db_user, $db_pass, $opt);
$stmt = $pdo->prepare('SELECT * FROM `users` WHERE `login` = ? AND `password` = ?');
$stmt->execute($array);
$userExists = $stmt->rowCount();
//echo $userExists;

switch($userexists){
	case 0: header("Location: http://site.name/auth"); break;
	case 1: $_SESSION['user'] = $user; header("Location: http://site.name/"); break;
}

?>

В самом минимальном варианте можно реализовать так. По усложнениям и наворотам нужно договариваться
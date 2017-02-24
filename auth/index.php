<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/params.php';
include PATH.'/backend/connect.php';
//include PATH.'/backend/debug.php';
?>

<?
// Проверка наличия логина и его содержимого в ПОСТ
if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
	$login = stripslashes($login);
    $login = htmlspecialchars($login);
	$login = trim($login);
	//echo 'login: ' . $login . '<br>';
	if ($login == '')  {$message = 'Введите логин'; unset($login);}
}
// Если ПОСТ логин есть, проверяем наличие в БД
if (isset($login)) {
	$query = sprintf("SELECT * FROM users WHERE login='%s'", 
	mysql_real_escape_string($login));
	$userexists = mysql_num_rows(mysql_query($query));
	//echo 'userexists ' . $userexists;
	switch ($userexists){
	case 0: $message = 'Пользователь не зарегистрирован'; unset($userexists); break;
	case 1: $message = 'Неверная пара логин/пароль'; break;
	}
}
// Если в БД ЕСТЬ логин , сверяем его с паролем в БД
if (isset($userexists)) {
	$password = $_POST['password'];
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$password = trim($password);
	$password = md5($password);
	$query = sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'", 
	mysql_real_escape_string($login),
	mysql_real_escape_string($password)
	);
	echo $query;
	$passwordexists = mysql_num_rows(mysql_query($query));
	switch ($passwordexists){
	case 0: $message = 'Неверная пара логин/пароль'; unset($userexists); break;
	case 1: 
		$message = 'OK!'; 
		$_SESSION['login'] =  $login;
		$_SESSION['password'] =  $password;
		header("Location: http://velo.market/");
		break;
	}
}

?>

<div class="frame">
		<form method="post" action="index.php">
		<p align=center>
		<input size="15" maxlength="15" name="login" type="text"   placeholder="Логин" value=<? echo $_POST['login'] ?>>
		</p>
		<p align=center>
		<input size="15" maxlength="15" name="password" type="password"  placeholder="Пароль">
		</p>
		<p align=center>
		<input type="submit" name="submit" value="Войти"><br>
		</p>
		<? echo $message; ?>
		</form>
	</div>

</body>
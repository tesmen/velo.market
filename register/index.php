<?
session_start();
include '../backend/connect.php';
include '../backend/debug.php';

// Проверка наличия логина и его содержимого в ПОСТ
if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
	$login = stripslashes($login);
    $login = htmlspecialchars($login);
	$login = trim($login);
	echo 'login: ' . $login . '<br>';
	if ($login == '')  {$message = 'Введите логин'; unset($login);}
}
// Если ПОСТ логин есть и не содержит пустоту, проверяем наличие в БД
if (isset($login)) {
	$query = sprintf("SELECT * FROM users WHERE login='%s'", 
	mysql_real_escape_string($login));
	$loginexists = mysql_num_rows(mysql_query($query));
	echo 'loginexists ' . $loginexists . '<br>';
	switch ($loginexists){
	case 0: $message = 'Логин свободен.';  break;
	case 1: $message = 'Логин уже занят'; unset($loginexists); break;
	}
}

// Если в БД НЕТ такого логина, проверяем валидность пароля
if (isset($loginexists) & $loginexists == 0) {
	$password = $_POST['password'];
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$password = trim($password);
	switch ($password != ''){
	case 0: $message .= ' Введите пароль!';  break;
	case 1: $message = 'Пароль валидный'; $passwordislegal = 1; $password=md5($password); break;
	}
}

if (isset($loginexists) & $passwordislegal == 1) {
	$query = sprintf("INSERT INTO users (login,password) VALUES('%s','%s')", 
	mysql_real_escape_string($login),
	mysql_real_escape_string($password)
	);
	echo $query;
	$register = mysql_query($query);
	switch ($register){
	case FALSE: $message = 'Ошибка при регистрации'; unset($userexists); break;
	case TRUE: 
		$message = 'OK!'; 
		$_SESSION['login'] =  $login;
		$_SESSION['password'] =  $password;
		header("Location: http://velo.market/");
		break;
	}
}

?>




<div class="frame"><!-- Форма регистрации -->
		<form method="post" action="index.php">
		<p align=center>
		Регистрация<br>
		<input size="15" maxlength="32" name="login" type="text"   placeholder="Логин" value=<? echo $_POST['login'] ?>>
		</p>
		<p align=center>
		<input size="15" maxlength="32" name="password" type="password"  placeholder="Пароль">
		</p>
		<p align=center>
		<input type="submit" name="submit" value="Вперед!"><br>
		</p>
		<? echo $message; ?>
		</form>
	</div>

</form>

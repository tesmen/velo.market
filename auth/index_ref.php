<?php
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
session_start();
include PATH.'/backend/connect.php';
include PATH.'/backend/debug.php';

// �������� ������� ������ � ��� ����������� � ����
if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
	$login = stripslashes($login);
    $login = htmlspecialchars($login);
	$login = trim($login);
	//echo 'login: ' . $login . '<br>';
	if ($login == '')  {$message = '������� �����'; unset($login);}
}
// ���� ���� ����� ����, ��������� ������� � ��
if (isset($login)) {
	$query = sprintf("SELECT * FROM users WHERE login='%s'", 
	mysql_real_escape_string($login));
	$userexists = mysql_num_rows(mysql_query($query));
	//echo 'userexists ' . $userexists;
	switch ($userexists){
	case 0: $message = '������������ �� ���������������'; unset($userexists); break;
	case 1: $message = '�������� ���� �����/������'; break;
	}
}
// ���� � �� ���� ����� , ������� ��� � ������� � ��
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
	case 0: $message = '�������� ���� �����/������'; unset($userexists); break;
	case 1: 
		$message = 'OK!'; 
		$_SESSION['login'] =  $login;
		$_SESSION['password'] =  $password;
		header("Location: http://velo.market/");
		break;
	}
}

?>

<html>
<head>
<title>�����������</title>
<link type="text/css" href="style.css" rel="stylesheet" />
</head>
<body>
<h2>�����������</h2>

<!-- ����� ����������� -->
<form method="post" style="width: 200; padding:10px;">
	<fieldset><legend>�����������</legend>
	<p align=center>
    <input size="15" maxlength="15" name="login" type="text"   placeholder="�����" value=<? echo $_POST['login'] ?>>
	</p>

	<p align=center>
    <input size="15" maxlength="15" name="password" type="password"  placeholder="������">
	</p>
	
	<p align=center>
	<input type="submit" name="submit" value="�����"><br>
	
	</p>
	<a href="../auth/reg.php">�����������</a> 
	<? echo $message; ?>
	</fieldset>
</form>


</body>
</html>

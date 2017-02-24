<div class='door'><!--Форма авторизации-->
		<form method="post" action="auth/index.php">
		<p align=center>
		<input size="15" maxlength="15" name="login" type="text"   placeholder="Логин" value=<? echo $_POST['login'] ?>>
		</p>
		<p align=center>
		<input size="15" maxlength="15" name="password" type="password"  placeholder="Пароль">
		</p>
		<p align=center>
		<input type="submit" name="submit" value="Войти"> |BK| <br>
		</p>
		</form>
</div>
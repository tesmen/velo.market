<div class='door'><!--Форма авторизации-->
		<form method="post" action="auth/index.php" style="width: 100%;">
		 
		<p align=center>
		<input size="15" maxlength="32" name="login" type="text"   placeholder="e-mail" value=<? echo $_POST['login'] ?>>
		</p>
		<p align=center>
		<input size="15" maxlength="32" name="password" type="password"  placeholder="Пароль">
		</p>
		<p align=center>
		<input type="submit" name="submit" value="Войти" class="btn btn-info btn-mini"> <a href="/vk_auth/"><img src="img/vk16.png"/></a> <br><br>
		<a href="/register">Регистрация</a>
		</p>
		</form>
</div>
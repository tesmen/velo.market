<form action="auth/exit.php" style="width: 100%;" class="form-actions">
	<p align=center>Вы вошли на сайт, как </p>
	<center><b><p class="lead"><? echo $_SESSION['login']; ?></p></b></center>
	<p align=center>
	<a href="/settings">Настройки аккаунта</a><br>
	<a href="/cabinet">Мои объявления</a><br>
	<input type="submit" value="Выход" style="width: 100;"><br>
	</p>
</form>
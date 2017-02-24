<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/params.php';
include PATH.'/backend/connect.php';
//include PATH.'/backend/debug.php';
?>


<div class="container"><!-- начало контейнера -->
<div class="logo" class="form-actions"></div>
<div class="nav"></div>
<div class="menu"></div>
<div class="content"></div>
<div class="cabinet">
	<?php
	if (empty($_SESSION['login'])){
	include 'guest.php';
	} else {   
    include 'user.php';
	}
	?>
</div>


</div><!-- конец контейнера -->
</body>
</html>

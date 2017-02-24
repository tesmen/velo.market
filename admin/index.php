<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/params.php';
include PATH.'/backend/connect.php';

?>


<link type="text/css" rel="stylesheet" href="style.css"/>

<div class="wrapper">
	<div class="btn_container">
	<? include "nav.php" ?>
	
	</div>

	<div class="tbl_container">
		<?
		if (isset($_GET[mod])) { include "mod_" . $_GET[mod]; } else {include "mod_welcome.php";}
		?>
	</div>
</div>
<!--
INSERT INTO `tezmo_velomarket`.`cats` (`id`, `name`) VALUES (NULL, 'Рули, выносы, грипсы');
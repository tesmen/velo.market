<?
SESSION_START();
include $_SERVER['DOCUMENT_ROOT'] . '/backend/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/backend/params.php';
include $_SERVER['DOCUMENT_ROOT'] . '/backend/connect.php';

?>


<link type="text/css" rel="stylesheet" href="style.css"/>

<div class="wrapper">
	<div class="top_nav">
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
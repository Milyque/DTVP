<?php 

	if (!isset($_SESSION['comp_reg'])) {
		header("Location: login.php");
	}
	$id_sess = $_SESSION['comp_reg'];

?>
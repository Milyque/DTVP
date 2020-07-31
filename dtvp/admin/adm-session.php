<?php 

if (!isset($_SESSION['username'])) {
	header('Location: adm-login.php');
}
$adm_sess = $_SESSION['username'];

?>
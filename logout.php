<?php 
session_start();
if (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
	session_destroy();
	header('location: login.php');
}


?>
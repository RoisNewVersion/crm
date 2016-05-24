<?php 

include 'sistem/db/MysqliDb.php';

session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$db = new MysqliDb();

$db->where('username', $username);
$db->where('password', $password);
$db->get('admin');
if ($db->count > 0) {
	$_SESSION['admin'] = 'admin';
	header('Location: index.php');
}else{
	echo "error";
}

?>
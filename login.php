<?php
session_start();
require('database.php');

$email = $_POST['email'];
$pass = $_POST['pass'];
$sconn = new Database();
$row = $sconn->get_row($email);
$count = $sconn->get_count($email);
$name = $sconn->get_name($email);
$_SESSION['name'] = $name;

if ($count == 1) {
	if (password_verify($pass, $row[1])) {
		header('Location:body.php');
		exit;
		// 
	} else {
		header("Location:login.php");
		exit;
		
	}
} else {
	header('Location:login_page.html');
	exit;
}

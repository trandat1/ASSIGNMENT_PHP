<?php
session_start();
require("database.php");
$sconn = new Database;

$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["password"];
$pass2 = $_POST["password2"];
$i = 1;
$password = password_hash($pass, PASSWORD_DEFAULT);
if ($pass == $pass2) {
	$check = $sconn->Insert($name, $email, $password, $i);
} else {
	header("Location:register_page.php");
}
if ($check === TRUE) {
	$_SESSION['name'] = $name;
	header("Location:body.php");
} else {
	header("Location:register_page.php");
}
$sconn->close();

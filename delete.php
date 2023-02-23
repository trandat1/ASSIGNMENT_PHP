<?php

require('database.php');
$sconn=new Database();

if(isset($_GET['id'])){
	$memberid = $_GET['id'];
}

$check=$sconn->del($memberid);
if($check==TRUE){
	header("Location:user.php");
}
$sconn->close();
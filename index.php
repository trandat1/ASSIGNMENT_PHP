<?php 
session_start();
// $name=$_SESSION['name'];
if($_SESSION['name']==""){
    header("Location:login_page.html ");
}
else{
    header("Location:body.php");
}




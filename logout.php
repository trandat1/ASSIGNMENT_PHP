<?php
    session_start();
    $_SESSION["name"] = "";
    session_destroy();
    header("Location: login_page.html");
?>


<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'trandata1';
$db_db = 'sampledb';
$db_port = 3306;

$mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
    $db_port
);

if ($mysqli->connect_error) {
    echo 'Errno: ' . $mysqli->connect_errno;
    echo '<br>';
    echo 'Error: ' . $mysqli->connect_error;
    exit();
}
$mysqli->set_charset('utf8');


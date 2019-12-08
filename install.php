<?php

$host = '127.0.0.1';
$database = 'ft_minishop';
$user = 'root';
$pass = 'root';
session_start();

$link = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()){
    echo "error: " . mysqli_connect_error();
    exit();
}

// else
//     echo "OK!\n";
mysqli_query($link, file_get_contents('init_db.sql'));

$res = mysqli_query ($link , "SELECT login, id FROM user WHERE id = '{$_SESSION['login']}';");
if (mysqli_num_rows($res) == 1)
{
    $current_login = mysqli_fetch_row($res)[0];
}
//https://www.php.net/manual/ru/book.mysqli.php
//https://www.php.net/manual/ru/mysqli-stmt.prepare.php
?>

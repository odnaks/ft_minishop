<?php

$host = '127.0.0.1';
$database = 'ft_minishop';
$user = 'root';
$pass = 'root';

$link = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()){
    echo "Error\n";
    exit();
}
// else
//     echo "OK!\n";
mysqli_query($link, "CREATE TABLE test2 (a VARCHAR(100) )");

//https://www.php.net/manual/ru/book.mysqli.php
//https://www.php.net/manual/ru/mysqli-stmt.prepare.php
?>
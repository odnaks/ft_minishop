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

mysqli_query($link, file_get_contents('query/Avatar.sql'));
mysqli_query($link, file_get_contents('query/User.sql'));
mysqli_query($link, file_get_contents('query/Category.sql'));
mysqli_query($link, file_get_contents('query/Item.sql'));
mysqli_query($link, file_get_contents('query/ItemCat.sql'));
mysqli_query($link, file_get_contents('query/BasketItem.sql'));
mysqli_query($link, file_get_contents('query/Orders.sql'));
mysqli_query($link, file_get_contents('query/OrdersBasketItem.sql'));

$res = mysqli_query($link, "SELECT * FROM Item;");
if (mysqli_num_rows($res) == 0) {
    mysqli_query($link,"insert into Item (Name, Link, Price) values ('white_big', 'https://github.com/foggliar/hello-world/blob/master/circle_1.png?raw=true', 100);");
    mysqli_query($link,"insert into Item (Name, Link, Price) values ('pink_big', 'https://github.com/foggliar/hello-world/blob/master/circle_2.png?raw=true', 100);");
    mysqli_query($link,"insert into Item (Name, Link, Price) values ('purple_big', 'https://github.com/foggliar/hello-world/blob/master/circle_3.png?raw=true', 100);");
    mysqli_query($link,"insert into Item (Name, Link, Price) values ('white_small', 'https://github.com/foggliar/hello-world/blob/master/circle_s_1.png?raw=true', 100);");
    mysqli_query($link,"insert into Item (Name, Link, Price) values ('pink_small', 'https://github.com/foggliar/hello-world/blob/master/circle_s_2.png?raw=true', 100);");
    mysqli_query($link,"insert into Item (Name, Link, Price) values ('purple_small', 'https://github.com/foggliar/hello-world/blob/master/circle_s_3.png?raw=true', 100);");
    
    mysqli_query($link,"insert into Category (Name) values ('white');");
    mysqli_query($link,"insert into Category (Name) values ('pink');");
    mysqli_query($link,"insert into Category (Name) values ('purple');");

    mysqli_query($link,"insert into Category (Name) values ('big');");
    mysqli_query($link,"insert into Category (Name) values ('small');");

    mysqli_query($link,"insert into ItemCat values (1, 1);");
    mysqli_query($link,"insert into ItemCat values (1, 4);");

    mysqli_query($link,"insert into ItemCat values (2, 2);");
    mysqli_query($link,"insert into ItemCat values (2, 4);");

    mysqli_query($link,"insert into ItemCat values (3, 3);");
    mysqli_query($link,"insert into ItemCat values (3, 4);");

    mysqli_query($link,"insert into ItemCat values (4, 1);");
    mysqli_query($link,"insert into ItemCat values (4, 5);");

    mysqli_query($link,"insert into ItemCat values (5, 2);");
    mysqli_query($link,"insert into ItemCat values (5, 5);");

    mysqli_query($link,"insert into ItemCat values (6, 3);");
    mysqli_query($link,"insert into ItemCat values (6, 5);");
}
        

$res = mysqli_query ($link , "SELECT login, id FROM user WHERE id = '{$_SESSION['login']}';");
if (mysqli_num_rows($res) == 1)
{
    $current_login = mysqli_fetch_row($res)[0];
}
//https://www.php.net/manual/ru/book.mysqli.php
//https://www.php.net/manual/ru/mysqli-stmt.prepare.php
?>

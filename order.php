<?
require('install.php');
    if($_SESSION['login']){
        mysqli_query ($link , "insert into orders (discount) values (5)");
        $idp = mysqli_query($link, "SELECT id
        FROM orders
        ORDER BY id DESC
        LIMIT 1");
        $id = mysqli_fetch_assoc($idp)['Id'];
    }
    $items = mysqli_query ($link , "select id from basketitem where userid = '{$_SESSION['login']}'");
    while ($item = mysqli_fetch_assoc($items))
    {
        mysqli_query ($link , "insert into OrdersBasketItem values ($id, {$item['Id']})");
    }
    //header('Location: index.php');
?>
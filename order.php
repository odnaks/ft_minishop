<?
require('install.php');
    if($_SESSION['login']){
        mysqli_query ($link , "insert into orders (discount) values (5)");
        $idp = mysqli_query($link, "select id from orders order by id desc limit 1;");
        $id = mysqli_fetch_assoc($idp)['id'];
    
    $items = mysqli_query ($link , "select id from basketitem where userid = '{$_SESSION['login']}'");
    while ($item = mysqli_fetch_assoc($items))
    {
        mysqli_query ($link , "insert into OrdersBasketItem values ($id, {$item['id']})");
    }
    
    mysqli_query ($link , "update basketitem set bought = 1 where userid = '{$_SESSION['login']}'");
}
    header('Location: index.php');
?>
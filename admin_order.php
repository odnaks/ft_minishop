<?php
require('install.php');


$res = mysqli_query ($link , "select * from OrdersBasketItem join BasketItem where OrdersBasketItem.BasketId = BasketItem.id;");
while ($item = mysqli_fetch_assoc($res))
{
    print "<b>" . $item['OrderId'] . "</b> <b> ". $item['ItemId'] ."</b><br>";
}


?>

<html>

<?
    require('header.php');

    
?>
<div class="body_log">

<?php



$res = mysqli_query ($link , "select * from OrdersBasketItem join BasketItem where OrdersBasketItem.BasketId = BasketItem.id;");
while ($item = mysqli_fetch_assoc($res))
{
    print  $item['OrderId'] . "  ". $item['ItemId'] . "<br>";
}


?>

</div>

    

</body>
</html>

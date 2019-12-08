<?php
    include ("install.php");
    if($_SESSION['login']){
        $res = mysqli_query ($link , "SELECT * FROM basketitem INNER JOIN item ON basketitem.itemid = item.id WHERE userid = {$_SESSION['login']}  AND bought = 0;");
    } else {
        $itemslist = implode("' OR id = '", array_keys($_SESSION['basket']));
        $res = mysqli_query ($link , "SELECT * FROM item WHERE id = '$itemslist'");
    }
    $fullprise = 0;
?>
    <form class='basket' action='basket_page.php' method='POST'>
    <b class='title_item'> Корзина: </b><br /><br /><br />
<?
    while ($item = mysqli_fetch_assoc($res))
    {
        if(!$_SESSION['login']){
            $item['Buy'] = $_SESSION['basket'][$item['Id']];
        }
        $fullprise += $item['Buy'] * $item['Price'];
?>
    <b class='basket_item'>
        <img src='<?=$item['Link']?>' width='100px'>
        &nbsp;&nbsp;
        <?=$item['Name']?>
        Цена:  <?=$item["Price"] * $item['Buy']?>
        &nbsp;
        <button type='submit' name='-' value='<?=$item["Id"]?>'>-</button>
        <?=$item['Buy']?>
        <button type='submit' name='+' value='<?=$item["Id"]?>'>+</button>
        &nbsp;
        <button type='submit' name='delete' value='<?=$item["Id"]?>'>&#9850;</button>
    </b>
        
<?
    }
    
    // if( isset( $_POST['but_item'] ))
    // {
    //     mysqli_query ($link , "INSERT INTO basket VALUES ('" . $_SESSION['login'] . "', '" . $_POST['but_item'] . "', 1 , 0);" );
    //     echo "<b>  Кнопка нажата  </b>";
    // }
    //&#9745;
    //&#9746;

?>
    <h2 class='basket_item'>Fullprice: <?=($fullprise) ? : 0?> </h2>
    <input class='order-btn' type='submit' name='ORDER' value='ORDER'?>
</form>




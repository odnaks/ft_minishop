<?php
    include ("install.php");

    $res = mysqli_query ($link , "select * from basketitem inner join item on basketitem.itemid = item.id where userid = {$_SESSION['login']};"  );
?>
    <form class='basket' action='basket_page.php' method='POST'>
    <b class='title_item'> Корзина: </b><br /><br /><br />




<?
    while ($item = mysqli_fetch_assoc($res))
    {
?>
    <b class='basket_item'>
        <img src='<?=$item['link']?>' width='100px'>
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
    <input class='order-btn' type='submit' name='ORDER' value='ORDER'?>
</form>




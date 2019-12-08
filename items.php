<form action='index.php' method='POST' class="items-container">
<?php

    if(is_numeric($_GET['cat'])){
        $items = mysqli_query ( $link , "SELECT id, name, price, link FROM itemcat JOIN item ON itemid=id WHERE catid = '". $_GET['cat']."';" );
    }
    if(!$items || !mysqli_num_rows($items)){
        $items = mysqli_query ( $link , "SELECT id, name, price, link FROM item" );
    }

    while ($item = mysqli_fetch_assoc($items))
    {
?>

<div class="item">
    <img src ='<?=$item["link"]?>'/>
    <br />
    <b class='main_item'>Цена:  <?=$item["price"]?></b><br/>
    <button type='submit' name='id' value='<?=$item["id"]?>'><?=$item["name"]?></button>
    <?#<input type='submit' name='id' value='<?=$item["id"]?>
    <br />
</div>

<?}?>
</form>


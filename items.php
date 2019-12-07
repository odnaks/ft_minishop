<form active='items.php' method='POST' class="items-container">
<?php

    if(is_numeric($_GET['cat'])){
        $items = mysqli_query ( $link , "SELECT name, price, link FROM itemcat JOIN item ON itemid=id WHERE catid = ".$_GET['cat'].";" );
    }
    if(!$items || !$items->num_rows){
        $items = mysqli_query ( $link , "SELECT name, price, link FROM item" );
    }
    $i = 0;
    while ($item= mysqli_fetch_assoc($items))
    {

?>

<div class="item">
    <img src ='<?=$item["link"]?>'/>
    <br />
    <b class='title_item'>Цена:  <?=$item["price"]?></b><br/>
    <input type='submit' name='but_item' value='<?=$item["name"]?>'>
    <br />
</div>

<?php
    }

    if( isset( $_POST['but_item'] ))
    {
        mysqli_query ($link , "INSERT INTO basketitem VALUES ('" . $_SESSION['login'] . "', '" . $_POST['but_item'] . "', 1 , 0);" );
        echo "<b>  Кнопка нажата  </b>";
    }

?>
</form>

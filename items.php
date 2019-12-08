<form active='items.php' method='POST' class="items-container">
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
    <b class='title_item'>Цена:  <?=$item["price"]?></b><br/>
    <button type='submit' name='id' value='<?=$item["id"]?>'><?=$item["name"]?></button>
    <?#<input type='submit' name='id' value='<?=$item["id"]?>
    <br />
</div>

<?php
    }

    if(isset($_POST['id']))
    {
        if($_SESSION['login']){
            $id = $_POST['id'];
            $login = $_SESSION['login'];
            $buys = mysqli_query($link , "SELECT buy FROM basketitem WHERE userid='$login' AND itemid='$id';");
            if(mysqli_num_rows($buys)){

                mysqli_query ($link , "UPDATE basketitem SET buy = buy + 1 WHERE userid='$login' AND itemid='$id';" );
            }else {
                mysqli_query ($link , "INSERT INTO basketitem VALUES ('$login', '$id', 1);" );
            }
            echo "added to cart! ";
        } else {
            echo "You need to login!";
        }
    }

?>
</form>


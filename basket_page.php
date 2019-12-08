<?php
require('install.php');
if($_POST['+']){
    mysqli_query ($link , "UPDATE basketitem SET buy = buy + 1 WHERE userid='{$_SESSION['login']}' AND itemid='{$_POST['+']}' AND buy < 99;");
} else if($_POST['-']){
    mysqli_query ($link , "UPDATE basketitem SET buy = buy - 1 WHERE userid='{$_SESSION['login']}' AND itemid='{$_POST['-']}' AND buy > 0;");
} else if($_POST['delete']){
    mysqli_query ($link , "delete from basketitem WHERE userid='{$_SESSION['login']}' AND itemid='{$_POST['delete']}'");
}

?>

<html>
<?
    require('header.php');
?>
    <div class="basket">

    <?php
        require('basket.php');
    ?>

    </div>

</body>
</html>

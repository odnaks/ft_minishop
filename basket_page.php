<?php
require('install.php');
if($_SESSION['login']){
    if($_POST['+']){
    mysqli_query ($link , "UPDATE basketitem SET buy = buy + 1 WHERE userid='{$_SESSION['login']}' AND itemid='{$_POST['+']}' AND buy < 99;");
    } else if($_POST['-']){
        mysqli_query ($link , "UPDATE basketitem SET buy = buy - 1 WHERE userid='{$_SESSION['login']}' AND itemid='{$_POST['-']}' AND buy > 0;");
    } else if($_POST['delete']){
        mysqli_query ($link , "delete from basketitem WHERE userid='{$_SESSION['login']}' AND itemid='{$_POST['delete']}'");
    } else if($_POST['ORDER'] == 'ORDER'){
        header('Location: order.php');
    }
} else {
    if($_POST['+']){
        $_SESSION['basket'][$_POST['+']] = min($_SESSION['basket'][$_POST['+']] + 1, 99);
    } else if($_POST['-']){
        $_SESSION['basket'][$_POST['-']] = max($_SESSION['basket'][$_POST['-']] - 1, 0);
    } else if($_POST['delete']){
        unset($_SESSION['basket'][$_POST['delete']]);
    } else if($_POST['ORDER'] == 'ORDER'){
        header('Location: registration.php');
    }
}
?>

<html>
<?
    require('header.php');
?>


    <?php
        require('basket.php');
    ?>

    

</body>
</html>

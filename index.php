<?php
require('install.php');

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    if($_SESSION['login']){
        
        $loginid = $_SESSION['login'];
        $buys = mysqli_query($link , "SELECT buy FROM basketitem WHERE userid='$loginid' AND itemid='$id';");
        if(mysqli_num_rows($buys)){

            mysqli_query ($link , "UPDATE basketitem SET buy = buy + 1 WHERE userid='$loginid' AND itemid='$id' AND buy < 100;" );
        }else {
            mysqli_query ($link , "INSERT INTO basketitem VALUES ('$loginid', '$id', 1);" );
        }
        echo "added to cart! ";
    } else {
        //header('Location: log_in.php');

        if(!$_SESSION['basket'])
            $_SESSION['basket'] = [];

        if(array_key_exists($id, $_SESSION['basket']))
            $_SESSION['basket'][$id]++;
        else
            $_SESSION['basket'][$id] = 1;
    }
}
?>
<html>
<?php
require('header.php');
?>
    <div class="body">
    <!-- <img src="https://github.com/foggliar/hello-world/blob/master/circle_1.png?raw=true"/>
    <img src ="https://github.com/foggliar/hello-world/blob/master/circle_2.png?raw=true" width="300" height="300"/>
    <img src ="https://github.com/foggliar/hello-world/blob/master/circle_3.png?raw=true" width="300" height="300"/> -->
    <center>
    <?php
    require('items.php');
    ?>
    </center>
    </div>
    <div class="cat">
    <div class="text_cat">
    <?php
    require('cat.php');
    ?>
    </div>
    </div>

</body>
</html>

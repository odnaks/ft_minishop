<?php
include ("install.php");
?>
<head>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="header">
            <div class="title">
                <a href ="index.php">
                    КРУЖКИ
                    </a>
            </div>
        <div class="menu">


        <a href='basket_page.php'>Basket&emsp;&emsp;</a>
        <?
        if($_SESSION['login']){
            $price = mysqli_fetch_assoc(mysqli_query ($link , "SELECT sum(buy * price) FROM basketitem JOIN item ON item.id=itemid where userid = {$_SESSION['login']} and bought = 0;"))['sum(buy * price)'];
            $items = mysqli_fetch_assoc(mysqli_query ($link , "SELECT sum(buy) FROM basketitem JOIN item ON item.id=itemid where userid = {$_SESSION['login']} and bought = 0;"))['sum(buy)'];
        } else {
            foreach($_SESSION['basket'] as $key => $val){
                $price += $val * 100;
                $item += $val;
            }
        }
        echo "Price: $price   ";
        echo "Items: $items";
        ?>
            <?=
                ($_SESSION['login']) ?
                    "<a href='log_out.php'>LogOut&#160;$current_login</a>" :
                    "<a href='log_in.php'>LogIn </a><a href='registration.php'>Registration</a>";
            ?>
        </div>
</div>

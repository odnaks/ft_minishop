<?php

    // session_start();
    //include ("install.php");

    $res = mysqli_query (  $link , "SELECT * FROM basket;"  );

    //echo "<form active='items.php' method='POST'>";
    echo "<b class='title_item'> Корзина: </b><br /><br /><br />";
    while ($set = mysqli_fetch_assoc($res))
    {
        echo "<b class='title_item'>". $set['ItemName'] . " " . $set['Count'] . "</b><br /><br />";
        //echo "<input type='submit' name='but_item' value='". $set['Name'] . "'>";
        
    }
    //echo "</form>";
    // if( isset( $_POST['but_item'] ))
    // {
    //     mysqli_query ($link , "INSERT INTO basket VALUES ('" . $_SESSION['login'] . "', '" . $_POST['but_item'] . "', 1 , 0);" );
    //     echo "<b>  Кнопка нажата  </b>";
    // }
    
?>

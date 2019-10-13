<?php

    // session_start();
    include ("install.php");

    $res = mysqli_query (  $link , "SELECT * FROM basket;"  );

    //echo "<form active='items.php' method='POST'>";
    while ($set = mysqli_fetch_assoc($res))
    {
        echo "<b>". $set['ItemName'] . " " . $set['Count'] . "</b><br />";
        //echo "<input type='submit' name='but_item' value='". $set['Name'] . "'>";
        
    }
    //echo "</form>";
    // if( isset( $_POST['but_item'] ))
    // {
    //     mysqli_query ($link , "INSERT INTO basket VALUES ('" . $_SESSION['login'] . "', '" . $_POST['but_item'] . "', 1 , 0);" );
    //     echo "<b>  Кнопка нажата  </b>";
    // }
    
?>

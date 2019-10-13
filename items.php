<?php

    include ("install.php");

    $res = mysqli_query (  $link , "SELECT * FROM item;"  );
    while ($set = mysqli_fetch_assoc($res))
    {
        echo "<b>". $set['Name'] . " " . $set['Price'] . "</b>";
        
        
    }

?>

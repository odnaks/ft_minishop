
<?php
//white 1
//pink 2
//purple 3

    //session_start();
    // include ("install.php");

    echo "<b class='title_item'> Категории: </b><br/><br/><br/><br/>";
    $res = mysqli_query (  $link , "SELECT * FROM category;" );

    while ($set = mysqli_fetch_assoc($res))
    {
        echo "<div class='title_item'><a href='index.php?cat=". $set['Name'] ."'> <b class='title_item'>". $set['Name'] . "</b><br/><br/></a></div>";
    }
    

?>

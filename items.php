
<?php
//white 1
//pink 2
//purple 3

    //session_start();
    // include ("install.php");

    $res = mysqli_query (  $link , "SELECT * FROM item;"  );

    echo "<form active='items.php' method='POST'>";
    while ($set = mysqli_fetch_assoc($res))
    {

        if ($set['Name'] == "white_big")
        {
            echo "<b class='title_item'>". $set['Name'] . "</b><br/>";
            echo "<img src ='https://github.com/foggliar/hello-world/blob/master/circle_1.png?raw=true' width='300' height='300'/>";
            echo "<br />";
            echo "<input type='submit' name='but_item' value='". $set['Name'] . "'>";
            echo "<br /><br /><br />";
        }
        if ($set['Name'] == "pink_big")
        {
            echo "<b class='title_item'>". $set['Name'] . "</b><br/>";
            echo "<img src ='https://github.com/foggliar/hello-world/blob/master/circle_2.png?raw=true' width='300' height='300'/>";
            echo "<br />";
            echo "<input type='submit' name='but_item' value='". $set['Name'] . "'>";
            echo "<br /><br /><br />";
        }
        if ($set['Name'] == "purple_big")
        {
            echo "<b class='title_item'>". $set['Name'] . "</b><br/>";
            echo "<img src ='https://github.com/foggliar/hello-world/blob/master/circle_3.png?raw=true' width='300' height='300'/>";
            echo "<br />";
            echo "<input type='submit' name='but_item' value='". $set['Name'] . "'>";
            echo "<br /><br /><br />";
        }
        //. " " . $set['Price'] . "</b>";

        
    }
    echo "</form>";
    if( isset( $_POST['but_item'] ))
    {
        mysqli_query ($link , "INSERT INTO basket VALUES ('" . $_SESSION['login'] . "', '" . $_POST['but_item'] . "', 1 , 0);" );
        echo "<b>  Кнопка нажата  </b>";
    }

?>

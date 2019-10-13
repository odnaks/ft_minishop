<?
    include ("install.php");
    if ($_GET['submit'] == "OK")
    {
        $err = "";
        if ($_GET['login'] != "" && $_GET['pass'] != "")
        {
            $login = $_GET['login'];
            $pass = $_GET['pass'];
            $res = mysqli_query (  $link , "SELECT Pass FROM user WHERE Login LIKE '" . $login ."';"  );
            if (mysqli_num_rows($res) == 0)
            {
                mysqli_query ($link , "INSERT INTO user VALUES ('" . $login ."', '" . $pass . "');" );
                // $pass_sql = mysqli_fetch_row( $res );
                // if ($pass_sql[0] == $pass)
                header("Location: index.php");
                // else
                //     $err = "Неверный пароль";

            }
            else
                $err = "Пользователь с таким логином существует";
            // mysqli_query ($link , "INSERT INTO user VALUES ('" . $login ."', '" . $pass . "');" );
            // $result  = mysqli_query ($link , "SELECT * FROM user;" );
    
        }
    }

?>
<html>

<?php
require('header.php');
?>
    <div class="body">
            
            <h1>
            <?php
                echo $err;
            ?>
            </h1>
            <center>
            <form active="log_in.php" methon="GET">
            <b class="login">login: </b> <input type="text" name="login" value=""><br />
            <b class="login">pass: </b> <input type="text" name="pass" value=""><br />
                <input type="submit" name="submit" value="OK"><br />
            </form>
            </center>
    </div>
</body>
</html>
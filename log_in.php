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
            if (mysqli_num_rows($res) == 1)
            {
                $pass_sql = mysqli_fetch_row( $res );
                if ($pass_sql[0] == $pass)
                    header("Location: index.php");
                else
                    $err = "Неверный пароль";
            }
            else
                $err = "Пользователя не существует";
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
            А это вход!
            <h1>
            <?php
                echo $err;
            ?>
            </h1>
            <center>
            <form active="log_in.php" methon="GET">
                login: <input type="text" name="login" value=""><br />
                pass: <input type="text" name="pass" value=""><br />
                <input type="submit" name="submit" value="OK"><br />
            </form>
            </center>
    </div>
</body>
</html>
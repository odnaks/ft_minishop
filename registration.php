<?
    include ("install.php");
    if ($_POST['submit'] == "OK")
    {
        $err = "";
        if ($_POST['login'] != "" && $_POST['password'] != "")
        {
            $login = $_POST['login'];
            $pass = hash('whirlpool', $_POST['password']);
            $res = mysqli_query (  $link , "SELECT login FROM user WHERE Login = '$login';"  );
            if (mysqli_num_rows($res) == 0)
            {
                mysqli_query ($link , "INSERT INTO user (login, password) VALUES ('$login', '$pass');");
                $res = mysqli_query ($link , "SELECT id FROM user WHERE login = '$login';");
                if (mysqli_num_rows($res) == 1)
                {
                    $_SESSION['login'] = mysqli_fetch_row($res)[0];
                }
                header("Location: index.php");
            }
            else
                $err = "Пользователь с таким логином существует";
            echo $err;
        }
    }

?>
<html>

<?php
require('header.php');
?>
    <div class="body_log">

            <h1>
            <?php
                echo $err;
            ?>
            </h1>
            <center>
            <form action="registration.php" method="POST">
                <b class="login">login: </b> <input type="text" name="login" value=""><br />
                <b class="login">pass: </b> <input type="password" name="password" value=""><br />
                <input type="submit" name="submit" value="OK"><br />
            </form>
            </center>
    </div>
</body>
</html>

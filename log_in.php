<?
    include ("install.php");

    if ($_POST['submit'] == "OK")
    {
        $err = "";
        if ($_POST['login'] != "" && $_POST['password'] != "")
        {
            $login = $_POST['login'];
            $pass = $_POST['password'];
            $res = mysqli_query ($link , "SELECT password, id FROM user WHERE Login = '$login';");
            if (mysqli_num_rows($res) == 1)
            {
                $pass_sql = mysqli_fetch_row( $res );
                if ($pass_sql[0] == hash('whirlpool', $pass))
                {
                    $_SESSION['login'] = $pass_sql[1];
                    header("Location: index.php");
                }
                else
                    $err = "Неверный пароль";
            }
            else{
                $err = "Пользователя не существует";
                $_POST['login'] = "";
            }
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
            <form action="log_in.php" method="POST">
                <b class="login">login: </b><input class="text" type="text" name="login" value="<?=$_POST['login']?>"><br />
                <b class="login">pass: </b><input type="password" name="password" value=""><br />
                <input type="submit" name="submit" value="OK"><br />
            </form>
            </center>
    </div>
</body>
</html>

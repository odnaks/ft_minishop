<?

    include ("install.php");
    if ($_GET['submit'] == "OK")
    {
        if ($_GET['login'] != "" && $_GET['pass'] != "")
        {
            // echo "OK";
            $login = $_GET['login'];
            $pass = $_GET['pass'];
            $res = mysqli_query (  $link , "SELECT Pass FROM user WHERE Login LIKE '" . $login ."';"  );
            if (mysqli_num_rows($res) == 1)
            {
                $pass_sql = mysqli_fetch_row( $res );
                if ($pass_sql[0] == $pass)
                {
                    header("Location: index.php");
                }
            }
        
            // mysqli_query ($link , "INSERT INTO user VALUES ('" . $login ."', '" . $pass . "');" );
            $result  = mysqli_query ($link , "SELECT * FROM user;" );
    
        }
    }

?>
<html>
<head>
<style>
        .body {
            position: absolute;
            top: 100px;
            height: 1000px;
            background: #000000;
            color: white;
            width: 100%;
        }
        body {
            margin: 0;
        }
        .header {
            position: absolute;
            top: 0;
            width: 100%; 
            height: 100px;
            background: #232323;
            color: #89f6f9;
        }
        .header a {
            color: #89f6f9;
        }
        .title {
            width: 30%;
            position: absolute;
            top: 5%;
            left: 40%;
            font-size: 40px;
        }
        .menu {
            position: absolute;
            top: 5%;
            right: 5%;
        }
        .menu a{
            color: #89f6f9;
        }
    </style>


</head>
<body>
    <div class="header">
        <a href ="index.php">
            <div class="title">
                == КРУЖКИ ==
            </div>
        </a>
        <div class="menu">
            <a href="">Basket</a>
            <a href="">Log in</a>
            <a href="">Registration</a>
        </div>
    </div>
    <div class="body">
            А это вход!
            <h1>
            <?php
                echo $pass_sql[0];
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
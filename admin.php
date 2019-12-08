<?php
include ("install.php");
if ($_POST['submititem'] == "ADD") {
	if ($_POST['item'] != "" && $_POST['price'] != "" && $_POST['link'] != "") {
		$item = $_POST['item'];
		$price = $_POST['price'];
		$link_post = $_POST['link'];
		$res = mysqli_query($link, "SELECT Name FROM Item where Name LIKE '".$item."';");
		if (mysqli_num_rows($res) == 0) {
			mysqli_query($link, "INSERT INTO Item (`Name`, `Link`, `Price`) VALUES ('".  $item .  "', '"  . $link_post. "', '". $price . "');");
		} else
			mysqli_query($link, "UPDATE item SET Price='".$price."' WHERE Name='".$item."';");
	}
} else if ($_POST['delitem'] == "DELETE") {
	if ($_POST['item'] != "") {
		$item = $_POST['item'];
		$res = mysqli_query($link, "SELECT Name FROM item where Name LIKE '" . $item . "';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "DELETE FROM item WHERE Name='" . $item . "';");
	}
} else if ($_POST['updprice'] == "UPDATE_PRICE") {
	if ($_POST['item'] != "") {
		$item = $_POST['item'];
		$price = $_POST['price'];
		$res = mysqli_query($link, "SELECT Name FROM item where Name LIKE '" . $item . "';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "UPDATE item SET Price='".$price."' WHERE Name='" . $item . "';");
	}
} else if ($_POST['updlink'] == "UPDATE_LINK") {
	if ($_POST['item'] != "") {
		$item = $_POST['item'];
		$link_post = $_POST['link'];
		$res = mysqli_query($link, "SELECT Name FROM item where Name LIKE '" . $item . "';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "UPDATE item SET Link='".$link_post."' WHERE Name='".$item."';");
	}
} else if ($_POST['submitcat'] == "ADD") {
	if ($_POST['cat'] != "") {
		$cat = $_POST['cat'];
		$res = mysqli_query($link, "SELECT Name FROM Category where Name LIKE '".$cat."';");
		if (mysqli_num_rows($res) == 0) {
			mysqli_query($link, "INSERT INTO Category (`Name`) VALUES ('". $cat . "');");
		}
	}
} else if ($_POST['delcat'] == "DELETE") {
	if ($_POST['cat'] != "") {
		$cat = $_POST['cat'];
		$res = mysqli_query($link, "SELECT Name FROM Category where Name LIKE '" . $cat . "';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "DELETE FROM Category WHERE Name='" . $cat . "';");
	}
} else if ($_POST['submituser'] == "ADD") {
	if ($_POST['login'] != "" && $_POST['password'] != "") {
		$login = $_POST['login'];
		$pass = hash('whirlpool', $_POST['password']);
		$res = mysqli_query($link, "SELECT Login FROM User where Login LIKE '". $login . "';");
		if (mysqli_num_rows($res) == 0) {
			mysqli_query($link, "INSERT INTO User (`Login`, `Password`) VALUES ('" .  $login .  "', '"  . $pass . "');");
		}
		// else
		// 	mysqli_query($link, "UPDATE item SET Price='".$price."' WHERE Name='".$item."';");
	}
} else if ($_POST['deluser'] == "DELETE") {
	if ($_POST['login'] != "") {
		$login = $_POST['login'];
		$res = mysqli_query($link, "SELECT Login FROM User where Login LIKE '" . $login . "';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "DELETE FROM User WHERE Login='" . $login . "';");
	}
} else if ($_POST['updpass'] == "UPDATE_PASS") {
	if ($_POST['login'] != "" && $_POST['password'] != "") {
		$login = $_POST['login'];
		$pass = hash('whirlpool', $_POST['password']);
		$res = mysqli_query($link, "SELECT Login FROM User where Login LIKE '" . $login . "';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "UPDATE User SET Password='".$pass."' WHERE Login='".$login."';");
	}
} else if ($_POST['submitci'] == "ADD") {
	if ($_POST['catitem'] != "" && $_POST['itemcat'] != "") {
		$cat = $_POST['catitem'];
		$item = $_POST['itemcat'];
		$res = mysqli_query($link, "SELECT Name FROM ItemCat where ItemId LIKE '".$item."' AND CatId LIKE '" . $cat . "';");
		if (mysqli_num_rows($res) == 0) {
			mysqli_query($link, "INSERT INTO ItemCat VALUES ('". $item . "', '" . $cat . "');");
		}
	}
} else if ($_POST['delci'] == "DELETE") {
	if ($_POST['catitem'] != "" && $_POST['itemcat'] != "") {
		$cat = $_POST['catitem'];
		$item = $_POST['itemcat'];
		$res = mysqli_query($link, "SELECT Name FROM ItemCat where ItemId LIKE '".$item."' AND CatId LIKE '" . $cat . "';");
		if (mysqli_num_rows($res) == 1) {
			mysqli_query($link, "DELETE FROM ItemCat WHERE ItemId = '".$item."' AND CatId = '" . $cat . "';");
		}
	}
} 




if ($_SESSION['login_name'] == "admin") {
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<?php
require('header.php');
?>
	<body style="background-color: #000000">

	

	
	<div class="body_log">

	
	<center>
	<a href='admin_order.php'><h3>Orders</h3></a>
	 <form action="admin.php" method="POST">
	 <br>
	 	Item: <br><br>
 		Name: <input type="text" name="item" value=""><br> <br>
	 	Price: <input type="text" name="price" value=""> <input type="submit" name="updprice" value="UPDATE_PRICE"> <br><br>
		Link: <input type="text" name="link" value=""> <input type="submit" name="updlink" value="UPDATE_LINK"><br><br>
		<input type="submit" name="submititem" value="ADD">
		<input type="submit" name="delitem" value="DELETE"><br>
	 </form>

	 <br><br>
	 <form action="admin.php" method="POST">
	 <br>
	 	Category: <br><br>
 		Name: <input type="text" name="cat" value=""><br><br>

		<input type="submit" name="submitcat" value="ADD">
		<input type="submit" name="delcat" value="DELETE"><br>
	 </form>
	

	 <br><br>
	 <form action="admin.php" method="POST">
	 <br>
	 	User: <br><br>
 		Login: <input type="text" name="login" value=""><br><br>
		Password: <input type="text" name="password" value=""> <input type="submit" name="updpass" value="UPDATE_PASS"><br><br>

		<input type="submit" name="submituser" value="ADD">
		<input type="submit" name="deluser" value="DELETE"><br>
	 </form>

	 <br><br>
	 <form action="admin.php" method="POST">
	 <br>
	 	Cat-Item: <br><br>
 		Category: 
		<select name="catitem" value="">
			<?php
				$res = mysqli_query ($link , "SELECT * FROM Category;");
				while ($item = mysqli_fetch_assoc($res))
				{
					print "<option value=" . $item['Id'] . ">" . $item['Name'] . "</option>";
				}
			?>
		</select><br><br>
		 
		 
		Item: 
		<select name="itemcat" value="">
			<?php
				$res = mysqli_query ($link , "SELECT * FROM Item;");
				while ($item = mysqli_fetch_assoc($res))
				{
					print "<option value=" . $item['Id'] . ">" .  $item['Name']   . "</option>";
				}
			?>
		</select><br><br>

		<input type="submit" name="submitci" value="ADD">
		<input type="submit" name="delci" value="DELETE"><br>
	 </form>
	<br>
	 </div>
	 </center>

	</body>
</html>

<?php 
}
else {

?>

<h1>You're not an admin. You're </h1>
<h2>
<?php
print ($_SESSION['login_name']);
}
?>
</h2>
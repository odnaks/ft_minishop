<?php
include ("install.php");
if($_POST['submititem'] == "ADD") {
	if ($_POST['item'] != "" && $_POST['price'] != "") {
		$item = $_POST['item'];
		$price = $_POST['price'];
		$res = mysqli_query($link, "SELECT Name FROM item where Name LIKE '".$item."';");
		if (mysqli_num_rows($res) == 0) {
			mysqli_query($link, "INSERT INTO item VALUES ('".$item."', '".$price."');");
		} else
			mysqli_query($link, "UPDATE item SET Price='".$price."' WHERE Name='".$item."';");
	}
} else if ($_POST['delitem'] == "DELETE") {
	if ($_POST['item'] != "") {
		$item = $_POST['item'];
		$res = mysqli_query($link, "SELECT Name FROM item where Name LIKE '".$item."';");
		if (mysqli_num_rows($res) != 0)
			mysqli_query($link, "DELETE FROM item WHERE Name='".$item."';");
	}
}

?>

<html>
<?php
require('header.php');
?>
	<div class="body_log">
	 <form action="admin.php" method="POST">
 		Item<input type="text" name="item" value=""><br />
	 	Price<input type="text" name="price" value=""><br />
		<input type="submit" name="submititem" value="ADD">
		<input type="submit" name="delitem" value="DELETE"><br />
	 </form>
	 </div>
	 <!-- <div class="cat">
	 <form action="admin.php" method="POST">
	 </form>
	 category
	 </div> -->
	</body>
</html>

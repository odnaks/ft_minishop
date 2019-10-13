<?php
include ("install.php");
if($_POST['submit'] == "OK") {
	if ($_POST['newitem'] != "" && $_POST['price'] != "") {
		$item = $_POST['item'];
		$price = $_POST['price'];
		$res = mysqli_query($link, "SELECT Price FROM item where Name LIKE '".$item."';");
		if (mysqli_num_rows($res) == 0)
			mysqli_query($link, "INSERT INTO item VALUES('".$item."', '".$price."');");
		else
			mysqli_query($link, "UPDATE item SET NAME = '".$item."', Price = '".$price."' WHERE id='".mysqli_num_rows($res)."';");
	}
}
?>

<html>
<?php
require('header.php');
?>
	<div class="body">
	 <form action="admin.php" method="POST">
 		Item<input type="text" name="item" value=""><br />
	 	Price<input type="text" name="price" value=""><br />
		<input type="submit" name="submititem" value="OK"><br />
	 </form>
	 </div>
	 <div class="cat">
	 <from action="admin.php" method="POST">
	 </form>
	 category
	 </div>
	</body>
</html>


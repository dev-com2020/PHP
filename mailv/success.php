<?php 
	session_start();
	require('emailVal-connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Success Page</title>
	<style type="text/css">
		#main {
			padding: 15px;
			border: 1px solid black;
			background: green;
		}
		h3 {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div id="main">
		<h3>To ADD an email, enter the address in the space below.</h3>
		<form action="process.php" method="post">
			<input type="text" name="email">
			<input type="hidden" name="action" value="add">
			<input type="submit" value="Submit">
		</form>
		<h3>To DELETE an email, enter the the address in the space below.</h3>
		<form action="process.php" method="post">
			<input type="text" name="email_delete">
			<input type="hidden" name="action" value="delete">
			<input type="submit" value="Delete">
		</form>
		<?php 
			if(isset($_SESSION['validation'])) {
				echo '<p>' .$_SESSION['validation']. '</p>';
			} ?>
	</div>
	<h3>Email Addresses Entered:</h3>
	<div id="log">
		<?php  
				$query_log = "SELECT * FROM emails";
				$result = fetch_all($query_log);
				foreach ($result as $row) {
					echo $row['email']. " " .$row['created_at']. '<br>';
				}
			?>
	</div>
</body>
</html>
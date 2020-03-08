<?php
	session_start();
	require('emailVal-connection.php');

	if(isset($_POST['action']) && $_POST['action'] == 'add') {
    	if (empty($_POST['email'])) {
			$_SESSION['validation'] = "Please enter a valid email address.";
		} else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$_SESSION['validation'] = "Please enter a valid email address.";
		} else {
			if (isset($_POST['email'])) {
				$query_add = "INSERT INTO emails (email, created_at, updated_at)
					VALUES('{$_POST['email']}', NOW(), NOW())";
				run_mysql_query($query_add);
				$_SESSION['validation'] = $_POST['email']. " has been submitted!";	
			}
		}
	}

	if(isset($_POST['action']) && $_POST['action'] == 'delete') {
		if (empty($_POST['email_delete'])) {
			$_SESSION['validation'] = "Please enter a valid email address.";
		} else if (filter_var($_POST['email_delete'], FILTER_VALIDATE_EMAIL) === false) {
			$_SESSION['validation'] = "Please enter a valid email address.";
		} else {
			if (isset($_POST['email_delete'])) {
				$query_delete = "DELETE FROM emails WHERE email = '{$_POST['email_delete']}'";
				run_mysql_query($query_delete);
				$_SESSION['validation'] = $_POST['email_delete']. " has been deleted!";
			}
		}	
	}
	
header('location: success.php');
?>
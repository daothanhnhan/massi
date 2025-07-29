<?php 
	session_start();
	include_once dirname(__FILE__).'/../database.php';
	$name = $_GET['name'];
	$email = $_GET['email'];
	$id = $_GET['id'];
	$sql = "SELECT * FROM user WHERE user_email = '$email'";
	$result = mysqli_query($conn_vn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		$pass = $id . 'gbvn';
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO user (user_name, user_email, id_go, user_password) VALUE ('$name', '$email', '$id', '$pass')";
		$result = mysqli_query($conn_vn, $sql);

		$sql = "SELECT * FROM user WHERE id_go = '$id'";
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_id_gbvn'] = $row['user_id'];
		$_SESSION['user_name_gbvn'] = $row['user_name'];
		echo 'ok';
		// echo $row['id'];
	} else {
		$row = mysqli_fetch_assoc($result);
		$id_go = $row['id_go'];
		$pass = $id . 'gbvn';
		$password = $row['user_password'];
		if ($id_go != '') {
			if (password_verify($pass, $password)) {
				$_SESSION['user_id_gbvn'] = $row['user_id'];
				$_SESSION['user_name_gbvn'] = $row['user_name'];
				echo 'ok';
			} else {
				echo 'error';
			}
		} else {
			echo 'has';
		}
	}
?>
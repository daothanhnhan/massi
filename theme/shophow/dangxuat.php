<?php 
	// session_destroy();
	unset($_SESSION['user_id_gbvn']);
	unset($_SESSION['user_name_gbvn']);
	if (isset($_COOKIE['user_id_trichdan'])) {
		setcookie('user_id_trichdan', '', time() - 2592000);
	}
	header('location: /dang-nhap');
?>
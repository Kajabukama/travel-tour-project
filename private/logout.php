<?php
	require_once 'core/functions.php';

	if (isset($_SESSION['uid'])) {

		unset($_SESSION['uid']);
		session_unset($_SESSION['uid']);
		session_destroy($_SESSION['uid']);

		header('Location:../');
	}


?>
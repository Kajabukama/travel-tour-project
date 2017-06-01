<?php

	require_once 'core/functions.php';
	if (isset($_SESSION['uid'])) {

		if (isset($_GET['action'])) {

			$action = $_GET['action'];

			switch ($action) {

				case 'delete-account':
					$userid = $_GET['userid'];
					if (delete('users',$userid)) {
						header('Location:view-accounts.php');
					}
					break;

				case 'delete-category':
					$catid = $_GET['catid'];
					if (delete('category',$catid)) {
						header('Location:view-categories.php');
					}
					break;
				
				case 'delete-subcategory':
					$subcatid = $_GET['subcatid'];
					if (delete('subcategory',$subcatid)) {
						header('Location:view-subcategories.php');
					}
					break;

				default:
					header('Location:.');
					break;
			}

		}
		

	} else {
		header('Location:../');
	}





?>
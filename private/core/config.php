<?php
	// reference to the database connection
	$link = "";
	// database constants
	define('DB_SERVER', 'localhost');
	define('DB_NAME', 'travel');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	// directory separator
    defined("DS") ? NULL : define("DS",DIRECTORY_SEPARATOR);
    defined("SITE_ROOT") ? NULL : define("SITE_ROOT", "C:".DS."wamp".DS."www".DS."travel");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="static/icon.png">
	<title>Cebong</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
		switch ($request_uri[0]) {
			// // Home page
			case '/':
				require 'templates/home.php';
				break;
			// Everything else
			default:
				header('HTTP/1.0 404 Not Found');
				break;
		}
	?>
</body>
</html>

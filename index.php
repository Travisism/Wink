<?php
// Wink Micro-Router
$path = array_values(array_filter(explode('/', $_SERVER['PATH_INFO'])));
$controller = preg_replace('/[^a-zA-Z0-9\s.]/', '', strtolower($path[0]));
$controller = preg_replace('/[\s\W]+/','-', $controller);
$controller = (empty($controller)) ? 'home' : $controller;
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Wink Micro-Router</title>
</head>
<body>
	<div class="app-header">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/info">Info</a></li>
		</ul>
	</div>
	<div class="app-content">
		<?php
			if(file_exists($controller . '.phtml')) {
				require_once($controller . '.phtml');
			} else {
				require_once('404.phtml');
			}
		?>
	</div>
</body>
</html>

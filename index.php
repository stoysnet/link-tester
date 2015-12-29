<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Link-tester</title>
	<style type="text/css">
		input {
			margin:10px;
		}
		.control {
			display:block;
		}
		.control label{
			display:block;
			width:200px;
		}
	</style>
</head>
<body>
	<h3>Link-tester</h3>
	<form method="POST" action="backend.php">
		<div class="control">
			<label for="site">Site:</label>
			<input type="text" name="cfg[url]" id="site" />
		</div>
		<div class="control">
			<label for="username">Username:</label>
			<input type="text" name="cfg[username]" id="username" />
		</div>
		<div class="control">
			<label for="password">Password:</label>
			<input type="text" name="cfg[password]" id="password" />
		</div>
		<input type="submit" value="Run" />
	</form>
</body>
</html>
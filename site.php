<?php
session_start();

if (!isset($_SESSION['logat']) || $_SESSION['logat']!="da") {
header('location: login.php');
}
?>
<html>
	<head>
		<title>pagina mea de aur</title>
	</head>
	<body>
		<h1>bine ai venit cetatene <?php echo $_SESSION['cinee']; ?></h1>
		<a href="logout.php">logout</a>
	</body>
</html>

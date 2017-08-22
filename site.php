<?php
session_start();


if (!isset($_SESSION['logat']) || $_SESSION['logat']!="da") {
header('location: login.php');
}

//verific cookie
if (isset($_COOKIE['bk1']) && $_COOKIE['bk1']==$a || isset($_COOKIE['bk1']) && $_COOKIE['bk1']==$b) {
	echo "ai ales background".$_COOKIE['bk1'], "<style>body{background-color:".$_COOKIE['bk1']."} #bkg{display:none} </style>";
	exit;
}

//creez cookie
if (isset($_POST['gata'])){
   if (($_POST['bifa_site']==1)||($_POST['bifa_site']==2)) {
			    setcookie('bk1', $_POST['bifa_site'], time()+20);				
				echo "ai ales background ".$_POST['bifa_site'], "<style>body{background-color:".$_POST['bifa_site']."}</style>";
				exit;
				}
			else 
				 echo "nu s-a setat cookie.";
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

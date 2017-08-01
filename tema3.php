
<?php
if (isset($_POST['culoare'])){
      $culoare=$_POST['culoare'];
}
$a=array(1,2,3,4,5,6,7,8,9,'a','b','c','d','f');
$culoare= "#";
for($i=1;$i<=6;$i++)
	$culoare.=$a[rand(0,15)];
?>

<html>
	<head>


		<body style="background: <?php echo $culoare; ?>;">
	<form method="post">
		<input type="submit"  value="Background-Color" />
		<input type="hidden"  />
	</form>

		</body>
	</head>
</html>
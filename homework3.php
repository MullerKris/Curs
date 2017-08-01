
<?php
if (isset($_POST['color']))
	$color=$_POST['color'];
else
	$color="#FFFFFF";

if (isset($_POST['counter'])) {
	$counter = $_POST['counter'] + 1;
	$counter = $counter % 4;
}
else
	$counter = 1;

if ($counter == 0) {
	$a=array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f');
	$color= "#";
	for($i=1;$i<=6;$i++)
		$color.=$a[rand(0,15)];
}
?>

<html>
	<head>
		<body style="background: <?php echo $color; ?>;">
	
			<form method="post">
				<input type="submit"  value="Background-Color" />
				<input type="hidden" name="counter" value="<?php echo $counter; ?>" /> 
				<input type="hidden" name="color" value="<?php echo $color; ?>" />
			</form>

		</body>
	</head>
</html>
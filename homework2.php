<?php
 if(isset($_POST['color'])) {
      $color=$_POST['color'];
  }
  else {
	  $color= "white";
  }
?>
<html>
	<head>
		<body bgcolor="<?php echo $color; ?>">
<form  method="post">
<select name="color">
		<option value="white" >Select color</option>
        <option style="background-color: green" >Green</option>
        <option style="background-color: blue" >Blue</option>
        <option style="background-color: red" >Red</option>
		<option style="background-color: black"  >Black</option>
		<option style="background-color: yellow" >Yellow</option>
		<option style="background-color: grey" >Grey</option>
		<option style="background-color: purple" >Purple</option>
		<option style="background-color: aqua" >Aqua</option>
		<option style="background-color: pink" >Pink</option>
		<option style="background-color: brown" >Brown</option>
		<option style="background-color: orange" >Orange</option> 
</select> <br><br>
<input type="submit" value="Background-Color" style="background-color: orange"  >
</form>
		</body>
	</head>
</html>
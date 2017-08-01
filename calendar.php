<?php
  if(isset($_POST['select'])) {
	echo $_POST["zi"] ."/";
	echo $_POST["luna"] ."/";
	echo $_POST["an"] ;
 }
?>

<form  method="post">
<select name="zi">
<option value="0">zi</option
<?php 
	for($i=1;$i<=31; $i++)
		if ($_POST["zi"]==$i)
		echo "<option selected>$i</option>";
	else
		echo "<option >$i</option>";
?>
</select>
<select name="luna">
<option value="0">luna</option>
<?php 
	for($i=1;$i<=12; $i++)
		if ($_POST["luna"]==$i)
		echo "<option selected>$i</option>";
	else
		echo "<option >$i</option>";
?>
</select>
<select name="an">
<option value="0">an</option>
<?php 
	for($i=2017;$i>=1900; $i--)
		if ($_POST["an"]==$i)
		echo "<option selected>$i</option>";
	else
		echo "<option >$i</option>";
?>
</select>

<input type="submit" name="select">
</form>
<?php 
//error_reporting(0);
 if (isset($_POST['sub'])) {
/*	if (strlen(trim($_POST['nr1']))<1) echo "scrie ceva la nr1";
	elseif (empty($_POST['nr2'])) echo "scrie ceva la nr2";*/
	if (!is_numeric($_POST['nr1'])) echo "scrie un numar la nr1";
	elseif (!is_numeric($_POST['nr2']) or $_POST['nr2']==0) echo "scrie un numar diferit de 0 la nr2";
	else {
		
		$nr1 = $_POST['nr1'];
		$nr2 = $_POST['nr2'];
		$op = $_POST['op'];
		
		switch ($op) {
			case "+": $rez = $nr1+$nr2; break;	
			case "-": $rez = $nr1-$nr2; break;
			case "*": $rez = $nr1*$nr2; break;
			case "/": $rez = $nr1/$nr2; break;		
		}		
	}	
}

?>
<form method="post">
<input type="text" name="nr1"  value="<?php echo $nr1; ?>"/>
<select name="op">
<option <?php if($op=="+") echo "selected"; ?>>+</option>
<option <?php if($op=="-") echo "selected"; ?>>-</option>
<option <?php if($op=="*") echo "selected"; ?>>*</option>
<option <?php if($op=="/") echo "selected"; ?>>/</option>
</select>
<input type="text" name="nr2"  value="<?php echo $nr2; ?>"/>
<input type="submit" name="sub" value="=" />
<input type="text" name="rez" value="<?php echo $rez; ?>" />
</form>
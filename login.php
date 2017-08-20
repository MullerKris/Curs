<?php
session_start();
$u="gigel";
$p="123";


if (isset($_POST['sub'])) {
	if (empty($_POST['nume'])) echo "scrie ceva la nume";
	elseif (empty($_POST['parola'])) echo "scrie ceva la parola";
	else {
		
		if ($_POST['nume']==$u && $_POST['parola']==$p) {
			
			$_SESSION['logat']="da";
			$_SESSION['cinee']=$_POST['nume'];
			header('location: site.php');
			die('n-a mers redirectarea!');
		} else echo "date incorecte!";
		
	}
}
?>
<form method=post>
<input name=nume type=text /><br>
<input name=parola type=password /><br>
<input name=sub type=submit value=intra />
</form>
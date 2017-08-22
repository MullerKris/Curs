<?php
session_start();
$u="gigel";
$p="123";

//verific daca am cookie sa fac login din ele
if (isset($_COOKIE['u']) && $_COOKIE['u']==$u && isset($_COOKIE['p']) && $_COOKIE['p']==$p ) {
	$_SESSION['logat']="da";
			$_SESSION['cinee']=$_COOKIE['u'];
			header('location: site.php');
			die('n-a mers redirectarea!');
}

if (isset($_POST['sub'])) {
	if (empty($_POST['nume'])) echo "scrie ceva la nume";
	elseif (empty($_POST['parola'])) echo "scrie ceva la parola";
	else {
		
		if ($_POST['nume']==$u && $_POST['parola']==$p) {
			if ($_POST['bifa']=="on") {
				setcookie('u', $_POST['nume'], time()+20);
				setcookie('p', md5($_POST['parola']), time()+20);				
			}
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
<input name=bifa type=checkbox /><br>
<input name=sub type=submit value=intra />
</form>
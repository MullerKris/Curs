<?php 

if (isset($_POST['trimite'])) {
	if (empty($_POST['nume'])) echo "scrie ceva la nume!";
	elseif (empty($_POST['prenume'])) echo "scrie ceva la prenume!";
	elseif (empty($_POST['adresa'])) echo "scrie ceva la adresa!";
	else {
		//pasul 1. creez o denumire dinamica de fisier
		$fisier = "useri.txt";
		$handle = fopen($fisier, "a+");
		flock($handle, LOCK_EX);
		flock($handle, LOCK_UN);
		fclose($handle);
}
		//pasul 2. creez o poveste cu tot ce s-a completat in formular		
		$poveste = "Nume: ".$_POST['nume']."\r\nPrenume: ".$_POST['prenume']."\r\nAdresa: ".str_ireplace("\r\n", "\r\n\t", $_POST['adresa'])."\r\nData nasterii: ".$_POST['zi']."/".$_POST['luna']."/".$_POST['an']."\r\nFumator: ".$_POST['fumator']."\r\n";
		
		//pasul 3. scriu povestea in fisier
		$handle = fopen($fisier, "a+");
		if (filesize($fisier) > 0)
			fwrite($handle, "**************\r\n");
		fwrite($handle, $poveste);
		fclose($handle);
		
		
	
}
?>
<form method="post" >
<input type="text" name="nume" placeholder="numele" /><br>
<input type="text" name="prenume" placeholder="prenumele"  /><br>
<textarea name="adresa" placeholder="adresa" ></textarea><br>
<select name="zi">
<option value="0">zi</option>
<?php for ($i=1; $i<=31; $i++) echo "<option>$i</option>"; ?>
</select>
<select name="luna">
<option value="0">luna</option>
<?php for ($i=1; $i<=12; $i++) echo "<option>$i</option>"; ?>
</select>
<select name="an">
<option value="0">an</option>
<?php for ($i=2017; $i>=1900; $i--) echo "<option>$i</option>"; ?>
</select><br>
<input type="radio" name="fumator" value="da"> DA 
<input type="radio" name="fumator" value="nu" checked> NU
<br>
<input type="submit" name="trimite" value="Trimite">
</form> 
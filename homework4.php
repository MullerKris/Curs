
<?php

if (isset($_POST['adauga'])) {
	$contor = $_POST['contor']+1;
} else $contor=0;

if (isset($_POST['trimite'])) {
	for ($i=0; $i<=$_POST['contor']; $i++) {
		
		$a = explode(".", $_FILES['f_'.$i]['name']);
		$ext = strtolower(end($a));
		$ext_permise = array('jpg', 'pdf', 'doc');
		if (in_array($ext, $ext_permise)) {
			move_uploaded_file($_FILES['f_'.$i]['tmp_name'], "poze/".time()."_".$i.".".$ext);
		}
		else echo "extensie incorecta!";
	
	}
}

?>

<form action="homework4.php" method="post" enctype="multipart/form-data" >
<?php 
for ($i=0; $i<=$contor; $i++)
	echo "<input type='file' name='f_$i' /><br/>";
?>
<input type="hidden" name="contor" value="<?php echo $contor; ?>" />
<input type="submit" name="trimite" value="Trimite" />
</form>
<form method="post">
<input type="hidden" name="contor" value="<?php echo $contor; ?>" />
<?php if ($contor<4) { ?>
<input type="submit" name="adauga" value="Adauga" />
<?php } ?>
</form>


<img src="<?php echo 'poze/'.time().'_'.'0'.'.'.$ext; ?>" width="100" height="100" />
<img src="<?php echo 'poze/'.time().'_'.'1'.'.'.$ext; ?>" width="100" height="100" />
<img src="<?php echo 'poze/'.time().'_'.'2'.'.'.$ext; ?>" width="100" height="100" />
<img src="<?php echo 'poze/'.time().'_'.'3'.'.'.$ext; ?>" width="100" height="100" />
<img src="<?php echo 'poze/'.time().'_'.'4'.'.'.$ext; ?>" width="100" height="100" />






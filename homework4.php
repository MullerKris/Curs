<style>
    .zoom {
    transition:transform 0.25s ease;
	margin-left: 150px;
	margin-top: 60px;
	margin-bottom: 30px;
	border-radius: 5px;
}

    .zoom:hover {
    -webkit-transform:scale(2.5); 
    transform:scale(2.5);
}
	.bg {
		margin-left: 20px;
		margin-top: 40px;
		background-color: aqua;
		margin-right:80%;
		text-align: center;
}
</style>


<?php

if (isset($_POST['adauga'])) {
	$contor = $_POST['contor']+1;
} else $contor=0;

$uploaded_jpg = array();
$uploaded_pdf = array();
$uploaded_doc = array();

if (isset($_POST['trimite'])) {
	for ($i=0; $i<=$_POST['contor']; $i++) {
		
		$a = explode(".", $_FILES['f_'.$i]['name']);
		$ext = strtolower(end($a));
		$ext_permise = array('jpg', 'pdf', 'doc');
		if (in_array($ext, $ext_permise)) {
			$new_file_name = "poze/".time()."_".$i.".".$ext;
			
			if ($ext == "jpg")
				array_push($uploaded_jpg, $new_file_name);
			else if ($ext == "pdf")
				array_push ($uploaded_pdf, $new_file_name);
			else if ($ext == "doc")
				array_push ($uploaded_doc, $new_file_name);
			
			move_uploaded_file($_FILES['f_'.$i]['tmp_name'], $new_file_name);
		}
		else echo "extensie incorecta!";
	
	}
}

?>
<div class="bg">
<form action="homework4.php" method="post" enctype="multipart/form-data" >
<?php 
for ($i=0; $i<=$contor; $i++)
	echo "<input type='file' name='f_$i' /><br/>";
?>
<input type="hidden" name="contor" value="<?php echo $contor; ?>". />
<input type="submit" name="trimite" value="Trimite" />
</form>
<form method="post">
<input type="hidden" name="contor" value="<?php echo $contor; ?>" />
<?php if ($contor<4) { ?>
<input type="submit" name="adauga" value="Adauga" />
<?php } ?>
</form>
</div>


<?php
	if (isset($_POST['contor']) && count($uploaded_jpg) > 0)
		for ($i=0; $i<count($uploaded_jpg); $i++) {
			echo '<img class="zoom" src="'.$uploaded_jpg[$i].'" width="100" height="100" />';
		}

?>

<br></br><br>


<div>

<?php
	if (isset($_POST['contor']) && count($uploaded_pdf) > 0)
		for ($i=0; $i<count($uploaded_pdf); $i++) {
			echo '<img src="./poze/pdf.jpg" style="width:20px;height:20px;"> &nbsp;';
			echo '<a  href="'.$uploaded_pdf[$i].'" >Download PDF</a>';
		}

?>

</div>

<div>

<?php
	if (isset($_POST['contor']) && count($uploaded_doc) > 0)
		for ($i=0; $i<count($uploaded_doc); $i++) {
			echo '<img src="./poze/doc.jpg" style="width:20px;height:20px;"> &nbsp;';
			echo '<a  href="'.$uploaded_doc[$i].'" >Download DOC</a>';
		}

?>
</div>


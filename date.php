<?php
$zi= array("","Luni","Marti","Miercuri","Joi","Vineri","Sambata","Duminica");
$luna= array(" ","Ianuarie","Februarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie");
echo "Astazi este"." ".$zi[date("N")].","." ".date("d").".".$luna[date("n")].".".date("Y").".";
?>




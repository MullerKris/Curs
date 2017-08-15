<?php
$countfile = 'contor.txt';

if (file_exists($countfile)) {           //verificam daca exista fisierul
	$fisier = fopen($countfile, "r");	//deschidem fisier pentru citire
	$accesari = (int)fgets($fisier);    //citeste o linia din fisier 
	fclose($fisier);                    //inchidem fisier
	
	$fisier = fopen($countfile, "w+");  //deschidem fisier pentru scriere
	$accesari = $accesari + 1;          //incrementam fisier cu unu
	fwrite($fisier, $accesari);         //scriem in fisier
	fclose($fisier);                    //inchidem fisier
} else {                                //daca nu exista
	$fisier = fopen($countfile, "w+");  //deschidem fisier pentru scriere 
	fwrite($fisier, "1");               //scriem in fisier 1
	fclose($fisier);                    //inchidem fisier
}
	
		
?>
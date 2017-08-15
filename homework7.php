<?php
$countfile = 'contor.txt';
$colorfile = 'culoare.txt';

if (file_exists($countfile)) {             //verificam daca exista fisierul
	$fisier = fopen($countfile, "r");	   //deschidem fisier pentru citire
	$accesari = (int)fgets($fisier);       //citeste o linia din fisier
	fclose($fisier);                       //inchidem fisier
	
	$fisier = fopen($countfile, "w+");     //deschidem fisier pentru scriere
	$accesari = $accesari + 1;             //incrementam fisierul cu unu
	fwrite($fisier, $accesari);            //scriem in fisier
	fclose($fisier);                       //inchidem fisier
} else {                                   //altfel
	$fisier = fopen($countfile, "w+");     //deschidem fisier pentru scriere 
	fwrite($fisier, "1");                  //scriem in fisier 1
	fclose($fisier);                       //inchidem fisier
}


if (file_exists($colorfile)) {             //verificam daca exista fisierul
	$fisier = fopen($countfile, "r");	   //deschidem fisier pentru citire
	$contor = (int)fgets($fisier);         //citeste o linie din fisier
	fclose($fisier);                       //inchidem fisier
	
	if ($contor % 5 == 0) {                //daca contor este divizibil cu 5
		$a=array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f');  // creem array pentru a putea creea o culoare
		$color= "#";                       // creem variabila # pentru ca asa incepe un cod de culoare
		for($i=1;$i<=6;$i++)               // pentru conditiile din paranteza
			$color.=$a[rand(0,15)];        // concatenam variabila # cu array-ul de mai sus prin alegerea aleatoare a 6 elemente din array
		$fisier = fopen($colorfile, "w+"); //deschidem fisier pentru scriere
		fwrite($fisier, $color);           //scriem in fisier
		fclose($fisier);                   //inchidem fisier
	}
	
} else {                                   //altfel
	$fisier = fopen($colorfile, "w+");     //deschidem fisier pentru scriere
	fwrite($fisier, "#FFFFFF");            //scriem in fisier culoarea alba
	fclose($fisier);                       //inchidem fisier
}

?>


<html>
	<head>
		<body style="background: 
				<?php 
				$fisier = fopen($colorfile, "r");   //deschidem fisier pentru citire
				$color = fgets($fisier);            //citim linea care reprezinta culoarea
				echo $color;                        //afisam culoarea pe ecran
				?>;">

		</body>
	</head>
</html>
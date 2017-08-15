<?php
// Fisierul unde este stocat nr. vizitatori
$countfile = 'contor.txt';
$handle = fopen($countfile, "a+");
		flock($handle, LOCK_EX);
		flock($handle, LOCK_UN);
		fclose($handle);
// Setare 1 nr. vizitatori si accesari, folosite cand pagina e accesata prima data
$vizitatori = 1;
$accesari = 1;
// Preia din URL pagina curenta, in format "urlencode"
$pagina = urlencode(strip_tags($_SERVER['REQUEST_URI']));
$r_pagina = $pagina."\r\n";			// Seteaza randul cu url-ul paginii care va fi adaugat in contor
// Daca fisierul pt. stocare contor poate fi accesat
if (file_exists($countfile)) {
	$fisier = fopen($countfile, 'r+b');		// Deschide fisierul pt. citire
	flock($fisier, LOCK_EX);		// Blocheaza fisierul
	// Citeste fisierul de stocare linie cu linie pentru gasirea cimpului cu URL-ul paginii.
	while($citeste = fgets($fisier)) {
		if(strcmp($citeste, $pagina."\r\n")==0) {		// Compara linia gasita cu $pagina (daca sunt egale 'strcmp'=0)
			$reda = ftell($fisier);			// Returneaza pozitia curenta a pointer-ului
			$vizit = explode("^^^",fgets($fisier));   // Preia in matrice nr. vizitatori si accesari care se afla pe linia imediat dupa pozitia gasita de 'ftell'
			$vizitatori = (int)$vizit[0];			// Seteaza valoarea pt. nr. vizitatori cea din contor, in integer (nr. natural))
			$accesari = (int)$vizit[1] + 1;		// Seteaza valoarea pt. nr. accesari in integer si o mareste cu o unitate
			$vizitatori++; 		// Mareste cu o unitate valoarea nr. vizitatori
			fseek($fisier, $reda);		// Seteaza noua pozitie a pointerului (de la inceputul fisierului in bytes) la nivelul precizat de 'ftell', pt a adauga in locul corect noile valoari
			$r_pagina = '';			// Randul cu pagina exista deja in contor
			break;		// Intrerupe executia lui WHILE
		}
	}
	$adauga = $r_pagina.$vizitatori.'^^^'.$accesari;		// Seteaza pt. adaugare valorile pt. contor 
	fputs($fisier, $adauga."\r\n");		// Adauga datele in fisier
	@flock($fisier, LOCK_UN);   // Deblocheaza fisierul
	fclose($fisier);		// Inchide accesul la fisier
}
?>
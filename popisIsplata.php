<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Moj Novčanik</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
	</head>









<body>
<div id="glavni">


<?php 
session_start();






if(isset($_SESSION['username']))
{
	echo '<header><h1>Popis Isplata - '.$_SESSION['username'].'</h1></header>';
}

else echo '<header><h1>Popis Isplata - Korisnik</h1></header>';
				
/*-------RADI-------*/				
	echo '<div id="kontejner">';
	
	$baza = mysqli_connect('sql5.freesqldatabase.com','sql578316','hM9%jX1!',"sql578316") or die("Neuspjelo spajanje na bazu!");
	//provjerava da li postoji ikakva isplata
	$upit = "SELECT COUNT(korisnik) FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."'";
	$rezultat = mysqli_query($baza, $upit);
	$brojRedova = mysqli_fetch_array($rezultat); 
	
	//echo '<div id="ispis">';
	
	
	if($brojRedova[0] == 0) 
	{
		echo '<div style="
	width: 100%; 
	height: auto;
	margin: 0 auto;
	padding-bottom:10px;
	" id="ispis">';
		echo 'Trenutno nemate nikakve transakcije zabilježene';
	}
	
	
	else
	{
	//ispisuje sve isplate
	$query = "SELECT nazivIsplate, iznos, vrijemeIsplate FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."';";
	$result = mysqli_query($baza, $query);
	
		$a=mysqli_num_rows($result);
echo '<div id="ispis">';
echo <<< BB
<table border="1" style="border-collapse:collapse;">
<tr>
<th><b>Ime isplate</b></th>
<th><b>Iznos (kn)</b></th>
<th><b>Vrijeme isplate</b></th>
</tr>
BB;




for($i=0; $i<$a; $i++){
	$row=mysqli_fetch_array($result);
echo <<< BBB
	<tr>
	<td>{$row['nazivIsplate']}</td>
	<td>{$row['iznos']}</td>
	<td>{$row['vrijemeIsplate']}</td>
	</tr>
BBB;
}
	
echo '</table>';	

echo'</div>';
}
	
	
	
	
	/*
	while($row = mysqli_fetch_array($result)) {
	
	
	echo ' <div id=popisIsplata>
			<b>Ime isplate:</b> ' .$row['nazivIsplate'] . '<br><br>
			<b>Iznos:</b> ' . $row['iznos'] . ' <br><br> 
			<b>Vrijeme isplate:</b> ' . $row['vrijemeIsplate'] . ' <br>
			<hr>';	
	
				}
			echo '</div>'
			}
				*/
		mysqli_close( $baza );		
				
/*+--------------------------*/					
		
				
	   ?>
	   
	 
	   
		<div id="izbornik">
		
			<div class="logoNovcanik">
			<a href="glavna.php"><img src="logo.png"></a>
			</div>
			
				
			<br/>
			<a href="uplata.php">Uplata</a>
			<br/>
			<a href="isplata.php">Isplata</a>
			</br>
			<a href="zadnjeTransakcije.php">Zadnje Transakcije</a>
			<br/>
			<a href="popisUplata.php">Popis Uplata</a>
			<br/>
			<a href="popisIsplata.php">Popis Isplata</a>
			<br/>
			<a href="statistika.php">Statistika</a>
			<br/>
			<a href="index.php">Odjava</a>
			
		</div>
		
	<br/>


    
	
    <footer>
		<p>Kreirao:&nbsp;&nbsp;&nbsp;&nbsp;Matko Horvat</p>
		<p>Kontakt:&nbsp;&nbsp;&nbsp;&nbsp;mhorvat5@tvz.hr</p>
		<p>Kreirano 2015.</p>
	</footer>   
	


</div>
</body>
</html>

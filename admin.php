<?php
include('session.php');
include('.\fpdf181\fpdf.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Beauty Salon</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">

</head>

<body>
 <SCRIPT type="text/javascript"  src="js.js"></SCRIPT>
<div class="red" id="nav">

<div class="icon">
    <a href="javascript:void(0);" style="font-size:20px;" onclick="prikaziMeni()">☰ </a>

</div>

<div id="nwrapper" class="navig"> 

<ul id="TopNav" class="topnav">
    <li> <a href="admin.php"> DOWNLOAD </a></li>
    <li> <a href="radsapodacima.php"> RAD SA PODACIMA </a></li>
	<li> <a href="#" onclick="prikaz('ffusluge.php')"> FRIZERSKE USLUGE </a></li>
	<li> <a href="#" onclick="prikaz('kusluge.php')"> KOZMETIČKE USLUGE </a></li>
	<li> <a href="logout.php"> LOGOUT </a></li>




</ul>


</div>

<div id="logo" >
	<img src="Slike/logo.png" alt="">
</div>

<div class="red" id="main">

<!-- PODACI IZ XML FAJLA DA SE SPASE U CSV FAJL -->
<!--GENERISANJE PDF FAJLA -->
<!-- ANKETA PODACI -->
<?php
   
$filexml='Newsletter.xml';
if (file_exists($filexml)) {
    $xml = simplexml_load_file($filexml);
$f = fopen('newsletter.csv', 'w');
foreach ($xml->newsletter as $nsl) {
    fputcsv($f, get_object_vars($nsl),',','"');
}
fclose($f);
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Izvjestaj');
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(225, 144, 149);
$pdf->Cell(0,20,'Beauty Salon',0,2,'C');
$pdf->SetFontSize(12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(2);
$pdf->Cell(40,10,'Ime i prezime',0);
$pdf->Cell(60,10,'E-mail',0);
$pdf->Cell(60,10,'Poruka',0,1);

$filexml='Kontakt.xml';

if (file_exists($filexml)) {
    $xml = simplexml_load_file($filexml);
  foreach ($xml->kontakt as $kontakt) {
    $pdf->Cell(40,10,$kontakt->ime);
    $pdf->Cell(60,10,$kontakt->email,0);
    $pdf->Cell(90,10,$kontakt->poruka,0,3);


      $pdf->Ln(2);
}

}
    
$pdf->Output('F','izvjestaj.pdf');  

// anketa
$pdf1 = new FPDF();
$pdf1->AddPage();
$pdf1->SetTitle('Anketa');
$pdf1->SetFont('Arial','B',20);
$pdf1->SetTextColor(225, 144, 149);
$pdf1->Cell(0,20,'Beauty Salon Anketa Izvjestaj',0,2,'C');
$pdf1->SetFontSize(12);
$pdf1->SetTextColor(0, 0, 0);
$pdf1->Ln(2);
$pdf1->Cell(40,10,'Izbor');
$pdf1->Cell(60,10,'Vrijednost',0,1);

$filexml='Anketa.xml';

if (file_exists($filexml)) {
    $xml = simplexml_load_file($filexml);
    $brojac=0;
    $brojac1=0;
    $brojac2=0;
    $brojac3=0;
    $brojac4=0;
  foreach ($xml->anketa as $anketa) {
    $pdf1->Cell(40,10,$anketa->vrijednost);
    $s='';
    if($anketa->vrijednost == 1){$s='jednom sedmicno'; $brojac1++;}
    else if($anketa->vrijednost == 2){$s='jednom mjesecno'; $brojac2++;}
    else if($anketa->vrijednost == 3){$s='jednom godisnje'; $brojac3++;}
    else {$s='nijednom do sada'; $brojac4++;}
    
    $pdf1->Cell(60,10,$s,0,1);

    $brojac++;
    $pdf1->Ln(2);
}
    $pdf1->Cell(40,10,'Glasalo ukupno: '.$brojac.'',0,1);
    $pdf1->Cell(40,10,'Jednom sedmicno: '.$brojac1 *100/$brojac.'%',0,1);
    $pdf1->Cell(40,10,'Jednom mjesecno: '.$brojac2 *100/$brojac.'%',0,1);
    $pdf1->Cell(40,10,'Jednom godisnje: '.$brojac3 *100/$brojac.'%',0,1);
    $pdf1->Cell(40,10,'Nijednom do sada: '.$brojac4 *100/$brojac.'%',0,1);


}
$pdf1->Output('F','anketa.pdf');  
      
?> 


<div class="kolona cetri">
<h1 class="underline">Admin panel</h1>
<!-- DA MI SKLINE NA KLIK NA DUGME FAJL -->
<form method="GET"  action="newsletter.csv"> 
<input type="submit" name="download" value="CSV" class="dugme">
</form>
<br>
<form method="GET"  action="izvjestaj.pdf"> 
<input type="submit" name="download1" value="PDF" class="dugme">
</form>
<br>
<form method="GET"  action="anketa.pdf"> 
<input type="submit" name="download2" value="Anketa" class="dugme">
</form>
     
   
</div>
</div>


<div class="red" id="footer">
	
	<div class="kolona jedan">
	
	<h5>RADNO VRIJEME</h5>
	<p>	Pon-Pet : 8:00 - 18:00 <br>
	Sub : 9:00 -16:00 <br>
	Nedjelja neradna. </p>

	</div>

	<div class="kolona dva">
	<h5>KONTAKT</h5>
	<p>e-mail: beautysalon@gmail.com <br>
	telefon: 062/ 123-456<p>

	</div>

	<div class="kolona jedan">
		<h5>LOKACIJA</h5>
		<p>Importanne Centar,<br>
		 Zmaja od Bosne bb, <br>
		drugi sprat</p>

	</div>
	
</div>

</body>
</html>
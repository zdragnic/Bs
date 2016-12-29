<?php
include('session.php');
include('fpdf181\fpdf.php');
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
    <li> <a href="profile.php"> DOWNLOAD </a></li>
    <li> <a href="radsapodacima.php"> RAD SA PODACIMA </a></li>
	<li> <a href="#" onclick="prikaz('ffusluge.php')"> FRIZERSKE USLUGE </a></li>
	<li> <a href="#" onclick="prikaz('kusluge.php')"> KOZMETIČKE USLUGE </a></li>
	<li> <a href="#" onclick="prikaz('kontakt.html')"> KONTAKT </a></li>
	<li> <a href="logout.php"> LOGOUT </a></li>




</ul>


</div>

<div id="logo" >
	<img src="Slike/logo.png" alt="">
</div>

<div class="red" id="main">

<!-- PODACI IZ XML FAJLA DA SE SPASE U CSV FAJL -->
<!--GENERISANJE PDF FAJLA -->
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
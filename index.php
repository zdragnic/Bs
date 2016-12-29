<?php
include('login.php');

if(isset($_SESSION['login_user'])){
header("location: admin.php");
}
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
	
	<li> <a id="trenutni" href="index.php"> POČETNA </a></li>
	<li> <a href="#" onclick="prikaz('onama.html')"> O NAMA </a></li>
	<li> <a href="#" onclick="prikaz('ffusluge.php')"> FRIZERSKE USLUGE </a></li>
	<li> <a href="#" onclick="prikaz('kusluge.php')"> KOZMETIČKE USLUGE </a></li>
	<li> <a href="kontakt.php" > KONTAKT </a></li>
   	<li> <a href="pretraga.php" > PRETRAGA </a></li>



</ul>


</div>

<div id="logo" >
	<img src="Slike/logo.png" alt="">
</div>

  <div id="login">     
    
<table>
<form action="" method="post">
        <TR><TD><input type="text" id="username" name="username" placeholder="username"></TD>
        <TD><input id="password" name="password" placeholder="password" type="password" ></TD>
        <TD><input name="submit" type="submit" value=" Login " class="dugme" ></TD>
        </TR>
        
               
  </form>
        </table>
<span><?php echo $error; ?></span>
</div> 
    
</div>



<div class="red" id="main">



	<div class="kolona cetri">
	<div class="underline"> <h1>Dobrodošli u Beauty Salon</h1> </div>
		
			<p>Beauty salon u prostranom i prijatnom ambijentu,nudi vam najnovije tretmane sa najsavremenijim aparatima iz oblasti tretmana lica i tijela.Posvetite se sebi i svojoj njezi, zaboravite  makar na kratko, svakodnevnicu, opustite se i uživajte u profesionalnim individualnim tretmanima najsavremenijih kozmetičkih metoda. Uvijek ljubazno i nasmijano osoblje spremno je da ogovori na sve izazove i Vaš izgled dovede do perfekcije!</p> <p> Naš stručni tim pobrinuće se da lijepi, zadovoljni i opušteni izađete iz naseg salona i zakoračite ka novim izazovima sigurni u sebe! Savremeni svetski kozmetički trendovi, profesionalni preparati najpoznatijih kozmetičkih kuća i inovativne metode rada u spoju sa tradicijom garancija su vrhunskog kvaliteta usluge u nasem salonu. Samo nekoliko koraka do ljepote, zadovoljstva i vrhunske njege a na Vama je da učinite prvi!  Zakoračite u carstvo ljepote i prepustite se profesionalcima!</p>
		</div>
    <!-- Skripta za spasavanje podataka u xml iz newsletter forme -->
    <!-- Validacija emaila prije unosa u xml -->
<?php
$greska="";
if(isset($_POST['newsdugme'])){
    
    $mejl=$_POST['email']; 
 if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",$mejl)){
   $greska="Unesite ispravan mail!"; 
}    
else{
    $greska="";
 if (!file_exists('Newsletter.xml')){
    $xml = new DOMDocument('1.0', 'UTF-8');

    /* korijenski element */
    $xmlKorijen = $xml->createElement("xml");
    /* dodamo ga u doc*/
    $xml->appendChild($xmlKorijen);

    $xml->save("Newsletter.xml");
}   
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Newsletter.xml");
    $xmlKorijen= $xml->documentElement;
    $nwsl = $xml->createElement("newsletter");
    $xmlKorijen->appendChild($nwsl);

    $nwsl->appendChild($xml->createElement('email',$mejl));
    
    $xml->save("Newsletter.xml");
}
}
    //upisivanje rezultata ankete u xml
    if(isset($_POST['glasaj']) && isset($_POST['anketa'])){
    
    $vrijednost=$_POST['anketa'];
    
            
    if (!file_exists('Anketa.xml')){
    $xml = new DOMDocument('1.0', 'UTF-8');

    /* korijenski element */
    $xmlKorijen = $xml->createElement("xml");
    /* dodamo ga u doc*/
    $xml->appendChild($xmlKorijen);

    $xml->save("Anketa.xml");
}   
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Anketa.xml");
    $xmlKorijen= $xml->documentElement;
    $anketa = $xml->createElement("anketa");
    $xmlKorijen->appendChild($anketa);

    $anketa->appendChild($xml->createElement('vrijednost',$vrijednost));
    
    $xml->save("Anketa.xml");
}
        
//rezultati ankete
if(isset($_POST['rezultati'])){
header("location: anketarez.php");

}
    
?>
	<div class="kolona cetri">
		<div class="underline"> <h1>Newsletter</h1> </div>
		<p>Prijavi se za novosti iz BS-a!</p><br>

		<form name="newslforma" onsubmit="return checkEmail();" method="POST">
		Email:<br>
  		<input type="text" name="email" id="newsl-mail" onchange="checkEmail()"> <br> 
  		<label id="news-labela"></label> <br><br>
        <input type="submit" value="Prijavi se!" class="dugme" name="newsdugme" > <br>
        <span> <?php print "$greska"; ?></span> <br>
		</form>
	</div>

	<div class="kolona cetri"> 
	<div class="underline"> <h1>Anketa</h1> </div>
		<p>Koliko često posjećujete kozmetički salon?</p>

		<form action="pocetna.php" method="post" >
	  	<input type='radio' name="anketa" value="1"> jednom sedmično<br>
  		<input type='radio' name="anketa" value="2"> jednom mjesečno<br>
 		<input type='radio' name="anketa" value="3"> jednom  godišnjee<br>
 		<input type='radio' name="anketa" value="4"> nijednom do sada<br><br>
        
  		<input type="submit" value="Glasaj" name="glasaj" class="dugme">
  		<input type="submit" value="Rezultati" name="rezultati" class="dugme" > <br>
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
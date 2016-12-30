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
	
	<li> <a id="trenutni" href="index.php" > POČETNA </a></li>
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

    
<!-- Skripta za spasavanje podataka u xml iz kontakt forme -->	
<!--Php validacija -->
<?php
$greska="";
if(isset($_POST['kontaktdugme'])){
    $ime=$_POST['imeprezime'];
    $mejl=$_POST['email'];
    $porukica=$_POST['poruka'];
if(!preg_match("/^[a-žA-Ž0-9][a-žA-Ž0-9\s.,?:+!]*$/", $porukica)){
    $greska="Poruka moze sadrzavati samo slova,brojeve i znakove :+?.,";
}

else if(!preg_match("/^[a-žA-Ž]*[\s][a-žA-Ž]*$/", $ime)){
  $greska="Unesite ispravno Vase ime i prezime!";  
}
else if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",$mejl)){
   $greska="Unesite ispravan mail!"; 
}    
    
else{
$greska="";
 if (!file_exists('Kontakt.xml')){
    $xml = new DOMDocument('1.0', 'UTF-8');

    /* korijenski element */
    $xmlKorijen = $xml->createElement("xml");
    /* dodamo ga u doc*/
    $xml->appendChild($xmlKorijen);

    $xml->save("Kontakt.xml");
}   
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Kontakt.xml");
    $xmlKorijen= $xml->documentElement;
    $kontakt = $xml->createElement("kontakt");
    $xmlKorijen->appendChild($kontakt);

    $kontakt->appendChild($xml->createElement('ime',htmlspecialchars($ime)));
    $kontakt->appendChild($xml->createElement('email',htmlspecialchars($mejl)));
    $kontakt->appendChild($xml->createElement('poruka',htmlspecialchars($porukica)));
    $xml->save("Kontakt.xml");
}
}
 


?>    

<div class="red" id="main">
	<div class="kolona cetri">
		<div class="underline"> <h1>Kontakt</h1> </div>

		<h2>Pošaljite nam poruku</h2>
		<form name="kontakt-forma" onsubmit="return validirajKontakt()"  action= "kontakt.php" method="POST">
		Ime i prezime:<br>
  		<input type="text" name="imeprezime"  class="kontakt-imemail" id="kontakt-ime" onchange="validirajKontakt();" > <br> 
  		Email:<br>
  		<input type="text" name="email"  class="kontakt-imemail" id="kontakt-mail" onchange="validirajKontakt();" > <br>
  		Poruka:<br>
  		<textarea  name="poruka" class="kontakt-poruka" id="kontakt-poruka" onchange="validirajKontakt();" > </textarea>  <br> 
  		<label id="kon-labela"></label> <br><br>
        <span><?php print "$greska"; ?></span> <br><br>
  		<input type="submit" value="Pošalji!" class="dugme" id="kon-dugme" name="kontaktdugme"> <br>

		</form>

		<div class="underline"><h1>Gdje se nalazimo?</h1></div>
		<div id="mapa">
			<br>
			<img src="Slike/mapa.png" alt=""> <br><br>
		</div>
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


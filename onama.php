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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
      $(window).load(function() {
        var theHash = "#main";
        $("html, body").animate({scrollTop:$(theHash).offset().top}, 800);
      });
    </script>
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
	<li> <a href="onama.php"> O NAMA </a></li>
	<li> <a href="ffusluge.php"> FRIZERSKE USLUGE </a></li>
	<li> <a href="kusluge1.php"> KOZMETIČKE USLUGE </a></li>
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
	<div class="underline"> <h1>O Nama</h1> </div>
	<p>Beauty salon u prostranom i prijatnom ambijentu,nudi vam najnovije tretmane sa najsavremenijim aparatima iz oblasti tretmana lica i tijela.Posvetite se sebi i svojoj njezi, zaboravite  makar na kratko, svakodnevnicu, opustite se i uživajte u profesionalnim individualnim tretmanima najsavremenijih kozmetičkih metoda.Uvijek ljubazno i nasmijjano osoblje spremno je da ogovori na sve izazove i Vaš izgled dovede do perfekcije!</p> 

        
        
        
<div id="slajdslike">

<button id="btnzoom" style="font-size:14px;" class="btn" > plus </button>

<img class="slajd" src="Slike/slide1.jpg">
<img class="slajd" src="Slike/slide2.jpg">
<img class="slajd" src="Slike/slide3.jpg">


<button id="btnlijevo" style="font-size:14px;" onclick="listajDugme(-1)"  > &#10094; </button>
<button id="btndesno" style="font-size:14px;" onclick="listajDugme(+1)"> &#10095; </button>	

</div>
        
<script>

var brojac=1;
prikaziSliku(brojac);  
function listajDugme(n) {
    prikaziSliku(brojac += n);
}

function prikaziSliku(n) {
    var i;
    var x = document.getElementsByClassName("slajd");
    if (n > x.length) {brojac = 1} //ako je na zadnjoj resetuje brojac da moze desno ici
    if (n < 1) {brojac = x.length} ; //ako je na prvoj-1 resetuje na zadnju da moze lijecvo ici
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; //ove ne prikazuje
    }
    x[brojac-1].style.display = "block"; //da samo prikaze onu na kojoj je brojac
  
}
</script>
</div>

	<div class="kolona cetri">
	
		
			<br>
			<p>Naš stručni tim pobrinuće se da lijepi, zadovoljni i opušteni izađete iz naseg salona i zakoračite ka novim izazovima sigurni u sebe! Savremeni svetski kozmetički trendovi, profesionalni preparati najpoznatijih kozmetičkih kuća i inovativne metode rada u spoju sa tradicijom garancija su vrhunskog kvaliteta usluge u nasem salonu. Samo nekoliko koraka do ljepote, zadovoljstva i vrhunske njege a na Vama je da učinite prvi!  Zakoračite u carstvo ljepote i prepustite se profesionalcima!</p>
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
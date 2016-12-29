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
	
	<li> <a id="trenutni" href="pocetna.php"> POČETNA </a></li>
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
		<div class="underline"> <h1>Kozmetičke usluge</h1></div>
        <br>
		<?php
        if (file_exists("Kusluge.xml")) {
        $xml = simplexml_load_file("Kusluge.xml");
        print "<table style='text-align:left; margin-left:30%; margin-right:30%; width:40%;'>";
        print "<tr><th>Naziv usluge</th><th>Cijena</th></tr>";
       
        foreach($xml->kusluga as $kusluga){
        print "<tr><td>".$kusluga->naziv."</td><td>".$kusluga->cijena."KM</td></tr>";

        }
         print "</table>";
        }
        ?>
       
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
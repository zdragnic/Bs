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
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}

function showResult1(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch1.php?q="+str,true);
  xmlhttp.send();
}
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
<div class="underline"><h1>Pretraga</h1></div>
<br> <br>
<form>
<table table style="text-align:left; margin-left:25%; margin-right:25%; width:40%;">
<tr> <td><input type="text" id="tekst" size="30" onkeyup="showResult(this.value); document.getElementById('vrijednost').value=this.value"> </td><td><input type="button" name="prikazisve" class="dugme" value="Trazi" onclick="showResult1(document.getElementById('vrijednost').value)"> </td></tr>
<tr><td><input type="hidden" id="vrijednost"></td></tr>
<br>
</table>
<div id="livesearch" style="text-align:left; margin-left:25%; margin-right:25%; width:40%;"></div>

</form>
<br>
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
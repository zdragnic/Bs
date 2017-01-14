<?php
include('session.php');
include('./fpdf181/fpdf.php');
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
   <li> <a href="admin.php"> DOWNLOAD </a></li>
    <li> <a href="radsapodacima.php"> RAD SA PODACIMA </a></li>
	<li> <a href="logout.php"> LOGOUT </a></li>




</ul>


</div>

<div id="logo" >
	<img src="Slike/logo.png" alt="">
</div>


</div>

<div class="red" id="main">


<div class="kolona cetri">
<h1 class="underline">Editovanje/Brisanje/Dodavanje</h1>
<div class="admintabela">
<?php
$greska="";    
$greska1="";    

//KONEKCIJA NA BAZU
$veza = new PDO("mysql:dbname=beautysalon;host=localhost;charset=utf8", "zerina", "wtspirala4");
$veza->exec("set names utf8");

//EDIT FUSLUGE
if(isset($_REQUEST['mijenjanjef'])){
    $red = $_REQUEST['redf'];
    $i='nazivf'.(string)$red ;
    $pr='cijenaf'.(string)$red ;
    
    $n=$_REQUEST[$i];
    $c=$_REQUEST[$pr];
    if(!preg_match('/^[a-žA-Ž][a-žA-Ž\s+]*$/',$n)){
        $greska1="Naziv sadrzi samo slova!";
    }
    
    else if(!is_numeric($c)){
        $greska1="Cijena mora samo brojeve sadrzavati!";
    }
    else{$greska1="";
    $xml=simplexml_load_file("Fusluge.xml");
     
$brojac=0;
foreach ($xml->fusluga as $fusluga) {
$brojac++;

if($brojac == $red){
    $fusluga->naziv= $n;
$fusluga->cijena= $c;

    break;
}

}
    $xml->asXML("Fusluge.xml");
         
     $r= $veza->query("UPDATE `fusluge` SET `nazivusluge` = '$n', `cijena` = '$c' WHERE `id` = '$red';");    
         
         
         
}  
    }
//EDIT KUSLUGE
if(isset($_REQUEST['mijenjanjek'])){
    $red = $_REQUEST['redk'];
    $i='nazivk'.(string)$red ;
    $pr='cijenak'.(string)$red ;
    $autor=$_SESSION['login_user'];

    
    $n=$_REQUEST[$i];
    $c=$_REQUEST[$pr];
    if(!preg_match('/^[a-žA-Ž][a-žA-Ž\s+]*$/',$n)){
        $greska1="Naziv sadrzi samo slova!";
    }
    
    else if(!is_numeric($c)){
        $greska1="Cijena mora samo brojeve sadrzavati!";
    }
    else{$greska1="";
    
    $xml=simplexml_load_file("Kusluge.xml");
     
$brojac=0;
foreach ($xml->kusluga as $kusluga) {
$brojac++;

if($brojac == $red){
    $kusluga->naziv= $n;
$kusluga->cijena= $c;

    break;
}

}
    $xml->asXML("Kusluge.xml");
         
    //edit u bazi
         $autorid= $veza->query("SELECT id FROM `korisnici` WHERE username LIKE '$autor';");
        $aid=$autorid->fetchColumn();    
    
        $r= $veza->query("UPDATE `kusluge` SET `nazivusluge` = '$n', `cijena` = '$c' WHERE `id` = '$red';");    
        $upitopis= $veza->query("UPDATE `uslugedetalji` SET  `opis`='Ovo je defaultni opis usluge. Stranica je u izradi. Pravi opisi naknadno ce biti dodani.', `autor`='$aid' WHERE `nazivusluge` LIKE '$n';");
            
}  
}    

    
//BRISANJE FUSLUGE
 if(isset($_REQUEST['brisanjef'])){
          $red = $_REQUEST['redf'];
    $i='nazivf'.(string)$red ;
    $pr='cijenaf'.(string)$red ;
     $n=$_REQUEST[$i];
    $c=$_REQUEST[$pr];
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Fusluge.xml");
    $xmlKorijen= $xml->documentElement;
     $items= $xml->getElementsByTagName('fusluga');

     for ($i = 0; $i < $items->length; $i++) {
  if($i === $red -1){
       $cvor=$items->item($i);
       $roditelj= $items->item($i)->parentNode; 
        $roditelj->removeChild($cvor);      
break;     
  }
  }
    $xml->save("Fusluge.xml");
     //iz baze
     $rezultat = $veza->query("DELETE FROM `fusluge` WHERE `fusluge`.`id` = $red ");
    
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	}
    
//BRISANJE KUSLUGE
 if(isset($_REQUEST['brisanjek'])){
          $red = $_REQUEST['redk'];
    $i='nazivk'.(string)$red ;
    $pr='cijenak'.(string)$red ;
     $n=$_REQUEST[$i];
    $c=$_REQUEST[$pr];
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Kusluge.xml");
    $xmlKorijen= $xml->documentElement;
     $items= $xml->getElementsByTagName('kusluga');

     for ($i = 0; $i < $items->length; $i++) {
  if($i === $red -1){
       $cvor=$items->item($i);
       $roditelj= $items->item($i)->parentNode; 
        $roditelj->removeChild($cvor);      
break;     
  }
  }
    $xml->save("Kusluge.xml");
     //iz baze
    
     $opis= $veza->query("DELETE FROM `uslugedetalji` WHERE `nazivusluge` LIKE '$n';");
      $rezultat = $veza->query("DELETE FROM `kusluge` WHERE `kusluge`.`id` = $red ");
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
}    
    
	
    


//DODAVANJE FUSLUGE
if(isset($_REQUEST['dodavanjef'])){
    $n=$_REQUEST['nazivf'];
    $c=$_REQUEST['cijenaf'];
   if(!preg_match('/^[a-žA-Ž][a-žA-Ž\s+]*$/',$n)){
        $greska1="Naziv sadrzi samo slova!";
    }
    
    else if(!is_numeric($c)){
        $greska1="Cijena mora samo brojeve sadrzavati!";
    }
    else{$greska1="";
    
     if (file_exists('Fusluge.xml')){
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Fusluge.xml");
    $xmlKorijen= $xml->documentElement;
    $kontakt = $xml->createElement("fusluga");
    $xmlKorijen->appendChild($kontakt);

    $kontakt->appendChild($xml->createElement('naziv',$n));
    $kontakt->appendChild($xml->createElement('cijena',$c));
    $xml->save("Fusluge.xml");
}
         
         
   $rezultat = $veza->query("INSERT INTO `fusluge` (`id`, `nazivusluge`, `cijena`) VALUES (NULL, '$n', '$c');");
    
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
}    
}
//DODAVANJE KUSLUGE
if(isset($_REQUEST['dodavanjek'])){
    $n=$_REQUEST['nazivk'];
    $c=$_REQUEST['cijenak'];
    $autor=$_SESSION['login_user'];
    
    
    if(!preg_match('/^[a-žA-Ž][a-žA-Ž\s+]*$/',$n)){
        $greska="Naziv sadrzi samo slova!";
    }
    
    else if(!is_numeric($c)){
        $greska="Cijena mora samo brojeve sadrzavati!";
    }
    else{$greska="";
    
     if (file_exists('Kusluge.xml')){
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->load("Kusluge.xml");
    $xmlKorijen= $xml->documentElement;
    $kontakt = $xml->createElement("kusluga");
    $xmlKorijen->appendChild($kontakt);

    $kontakt->appendChild($xml->createElement('naziv',$n));
    $kontakt->appendChild($xml->createElement('cijena',$c));
    $xml->save("Kusluge.xml");
}
    $autorid= $veza->query("SELECT id FROM `korisnici` WHERE username LIKE '$autor';");
        $aid=$autorid->fetchColumn();
     $rezultat = $veza->query("INSERT INTO `kusluge` (`id`, `nazivusluge`, `cijena`) VALUES (NULL, '$n', '$c');");
     $upitopis= $veza->query("INSERT INTO `uslugedetalji` (`nazivusluge`, `opis`, `autor`) VALUES ('$n', 'Ovo je defaultni opis usluge. Stranica je u izradi. Pravi opisi naknadno ce biti dodani.', '$aid');");
    
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

       
}  
}
    
    
//CJENOVNIK Frizerske
 if (file_exists("Fusluge.xml")) {
    $xml = simplexml_load_file("Fusluge.xml");

print "<table class='admintabela'>";
print "<TR> <TH>Frizerske usluge</TH> <TH>Cijena</TH></TR>";
print "<form action='radsapodacima.php' method='POST'>";
$vrijednostiF= $veza->query("SELECT id, nazivusluge, cijena FROM `fusluge` order by id asc ;");
if (!$vrijednostiF) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
             
$brojac=0;
     
foreach ($vrijednostiF as $fusluga) {
$brojac++;
print "<TR> 
<TD><input type='text' name='nazivf".$fusluga['id']."' value='".$fusluga['nazivusluge']."'></TD>
<TD><input type='text' name='cijenaf".$fusluga['id']."' value='".$fusluga['cijena']."'></TD> 

<TD> <input type='submit' class='dugmemanje' name='brisanjef' value='X' onclick=\"document.getElementById('brojredaf').value='" .$fusluga['id']. "'\"> <input type='submit'class='dugmemanje' name='mijenjanjef' value='E' onclick=\"document.getElementById('brojredaf').value='" .$fusluga['id']. "'\"></TD> </TR>";   
} 
 
print "<TR><TD><input type='hidden' name='redf' id='brojredaf' value=''> </TD> </TR>";

print "</form>";
print "<br>";
print "<form action='radsapodacima.php' method='POST'>";
print "<TR> <TD><input type='text' name='nazivf'></TD>
		<TD><input type='text' name='cijenaf'></TD>
		<TD><input type='submit' class='dugmemanje' name='dodavanjef' value='+'></TR>";

print "<form> ";
print "</table>";
print "<br><div style='float:left;'>".$greska1."</div>";
     
 }
print "<br>";
   
    
//CJENOVNIK Kozmeticke
//if (file_exists("Kusluge.xml")) {
$xml = simplexml_load_file("Kusluge.xml");

print "<table class='admintabela'>";
print "<TR> <TH>Kozmetičke usluge</TH> <TH>Cijena</TH></TR>";
print "<form action='radsapodacima.php' method='POST'>";

$vrijednostiK= $veza->query("SELECT id, nazivusluge, cijena FROM `kusluge` order by id asc ;");
if (!$vrijednostiK) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }    
$brojac=0;
foreach ($vrijednostiK as $kusluga) {
$brojac++;
print "<TR> 
<TD><input type='text' name='nazivk".$kusluga['id']."' value='".$kusluga['nazivusluge']."'></TD>
<TD><input type='text' name='cijenak".$kusluga['id']."' value='".$kusluga['cijena']."'></TD> 

<TD> <input type='submit' class='dugmemanje' name='brisanjek' value='X' onclick=\"document.getElementById('brojredak').value='" .$kusluga['id']. "'\"> <input type='submit'class='dugmemanje' name='mijenjanjek' value='E' onclick=\"document.getElementById('brojredak').value='" .$kusluga['id']. "'\"></TD> </TR>";   
}

print "<TR><TD><input type='hidden' name='redk' id='brojredak' value=''> </TD> </TR>";

print "</form>";
print "<br>";
print " <form action='radsapodacima.php' method='POST'>";
print "<TR><TD><input type='text' name='nazivk'></TD>
		<TD><input type='text' name='cijenak'></TD>
		<TD><input type='submit' class='dugmemanje' name='dodavanjek' value='+'> <TR>";
print "<form>";
print "</table>";
print "<br><div style='float:left;'>".$greska."</div>";

//}
    

    ?>  
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
<?php
 if (file_exists("Kusluge.xml")) {
 $xmlDoc = simplexml_load_file("Kusluge.xml");

$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";
$brojac=0;
  foreach($xmlDoc->kusluga as $kusluga) {
    $y=$kusluga->naziv;
    $z=$kusluga->cijena;
    
      if (stristr($y,$q) && stristr($z,$q)== false  ) {
        if ($hint=="") {
          $hint="<a href='kusluge1.php'>".
          $y." ". $z. "KM </a>";
            $brojac++;
            }
         
         else {
          $hint= $hint. "<br><a href='kusluge1.php'>".
          $y ." ". $z . "KM </a>";
           $brojac++;
        } 
          
        if($brojac==10 && isset($_REQUEST['prikazisve'])== false )break;
 }
    
    if (stristr($y,$q)==false && stristr($z,$q)  ) {
        if ($hint=="") {
          $hint="<a href='kusluge1.php'>".
          $y." ". $z. "KM </a>";
            $brojac++;
            }
         
         else {
          $hint= $hint. "<br/><a href='kusluge1.php'>".
          $y ." ". $z . "KM </a>";
           $brojac++;
        } 
        if($brojac==10 && isset($_REQUEST['prikazisve'])== false )break;
 }   
      if (stristr($y,$q) && stristr($z,$q)  ) {
        if ($hint=="") {
          $hint="<a href='kusluge1.php'>".
          $y." ". $z. "KM </a>";
            $brojac++;
            }
         
         else {
          $hint= $hint. "<br/><a href='kusluge1.php'>".
          $y ." ". $z . "KM </a>";
           $brojac++;
        } 
         if($brojac == 10) break;
}   
      
   if($brojac==10 && isset($_REQUEST['prikazisve'])== false )break;
  }}
      

    
if ($hint=="") {
  $odgovor="Nema nađenih rezultata";
} else {
  $odgovor=$hint;
}
 }
echo $odgovor;
?>
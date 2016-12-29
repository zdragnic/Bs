<?php
 if (file_exists("Kusluge.xml")) {
 $xmlDoc = simplexml_load_file("Kusluge.xml");

$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";

  foreach($xmlDoc->kusluga as $kusluga) {
    $y=$kusluga->naziv;
    $z=$kusluga->cijena;
    
      if (stristr($y,$q) && stristr($z,$q)== false  ) {
       if ($hint=="") {
          $hint="<a href='kusluge1.php'>".
          $y." ". $z. "KM </a>";
           
            }
         
         else {
          $hint= $hint. "<br><a href='kusluge1.php'>".
          $y ." ". $z . "KM </a>";
           
        } 
          
      }
    
    if (stristr($y,$q)==false && stristr($z,$q)  ) {
       if ($hint=="") {
          $hint="<a href='kusluge1.php'>".
          $y." ". $z. "KM </a>";
           
            }
         
         else {
          $hint= $hint. "<br><a href='kusluge1.php'>".
          $y ." ". $z . "KM </a>";
           
        } 
      }   
      if (stristr($y,$q) && stristr($z,$q)  ) {
        if ($hint=="") {
          $hint="<a href='kusluge1.php'>".
          $y." ". $z. "KM </a>";
            
            }
         
         else {
          $hint= $hint. "<br><a href='kusluge1.php'>".
          $y ." ". $z . "KM </a>";
           
        } 
      }   
      
  }}}
          
if ($hint=="") {
  $odgovor="Nema nađenih rezultata";
} else {
  $odgovor=$hint;
}
 
echo $odgovor;
?>
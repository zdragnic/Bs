<?php
 //if (file_exists("Kusluge.xml")) {
 //$xmlDoc = simplexml_load_file("Kusluge.xml");
$veza = new PDO("mysql:dbname=beautysalon;host=localhost;charset=utf8", "zerina", "wtspirala4");
$veza->exec("set names utf8");
$vrijednostiK= $veza->query("SELECT id, nazivusluge, cijena FROM `kusluge` order by id asc ;");
if (!$vrijednostiK) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }    
$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";

  foreach($vrijednostiK as $kusluga) {
    $y=$kusluga['nazivusluge'];
    $z=$kusluga['cijena'];
    
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
      
  }}
          
if ($hint=="") {
  $odgovor="Nema nađenih rezultata";
} else {
  $odgovor=$hint;
}
 
echo $odgovor;
?>
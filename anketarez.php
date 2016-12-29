<?php
include("./lib/inc/chartphp_dist.php");
  $filexml='Anketa.xml';

if (file_exists($filexml)){
    $xml = simplexml_load_file($filexml);
    $brojac = 0;
    $brojac1 = 0;
    $brojac2 = 0;
    $brojac3 = 0;
    $brojac4 = 0;
  foreach ($xml->anketa as $anketa) {
    
    if($anketa->vrijednost == 1){ $brojac1++;}
    else if($anketa->vrijednost == 2){ $brojac2++;}
    else if($anketa->vrijednost == 3){ $brojac3++;}
    else {$brojac4++;}
    $brojac++;
}
    $s1 ='Glasalo ukupno: '.$brojac.'';
    $s2 ='Jednom sedmicno: '.$brojac1 *100/$brojac.'%';
    $s3 = 'Jednom mjesecno: '.$brojac2 *100/$brojac.'%';
    $s4 = 'Jednom godisnje: '.$brojac3 *100/$brojac.'%';
    $s5 = 'Nijednom do sada: '.$brojac4 *100/$brojac.'%';

    $p= new chartphp();
    $p->chart_type = "pie";
    $p->title = "Koliko često posjećujete kozmetički salon?";  
$p->data = array(array(array('Jednom sedmicno', $brojac1),array('Jednom mjesecno', $brojac2), array('Jednom godisnje', $brojac3), array('Nijednom do sada', $brojac4)));


$out = $p->render('c1'); 

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Beauty Salon</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
    <script src="./lib/js/jquery.min.js"></script>
    <script src="./lib/js/chartphp.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="./lib/js/chartphp.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

</head>

<body>
    <div class="underline"><h1>Rezultati ankete</h1></div>
    <br> <br>
    <div style=" margin-left:40%; margin-right: 40%;">

    <?php 
   
    print "<br> $s2 <br> $s3 <br> $s4 <br> $s5 <br> $s1";

    ?>
        
</div>  
    <br><br>
     <div style="width:40%;  margin-left:30%; margin-right: 30%;"> 
        <?php echo $out; ?> 
        </div> 
</body>
<?php

function zaglavlje() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: aplication/json');
    header('Access-Control-Allow-Origin: *');
}


function dohvatiSve(){
$veza = new PDO("mysql:dbname=beautysalon;host=localhost;charset=utf8", "zerina", "wtspirala4");
$veza->exec("set names utf8");
$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "select * FROM `fusluge`ORDER BY id";
    try {
        $stmt = $veza->query($sql);
        $usluge = $stmt->fetchAll(PDO::FETCH_OBJ);
        $veza = null;
        echo '{"Usluge": ' . json_encode($usluge) . '}';
    } catch(PDOException $e) {
        echo '{"GRESKA":{"text":'. $e->getMessage() .'}}';
    }   
}

function dohvatiID($id){
$veza = new PDO("mysql:dbname=beautysalon;host=localhost;charset=utf8", "zerina", "wtspirala4");
$veza->exec("set names utf8");
$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "select * FROM `fusluge` WHERE `id`='$id' ORDER BY id";
    try {
        $stmt = $veza->query($sql);
        $usluge = $stmt->fetchAll(PDO::FETCH_OBJ);
        $veza = null;
        
        echo '{"Usluge": ' . json_encode($usluge) . '}';
    } catch(PDOException $e) {
        echo '{"GRESKA":{"text":'. $e->getMessage() .'}}';
    } 
}

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
        
    case 'GET':
       zaglavlje();
    if(isset($_GET['q'])){
        
    dohvatiID($_GET['q']);
    }
        else if ($_GET['q']==''){
    dohvatiSve();
        }
        break;
        
    default: header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found"); break;
    
}

/*if($method == 'GET'){
header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
header('Content-Type: aplication/json');
header('Access-Control-Allow-Origin: *');
if(isset($_GET['q'])){
    dohvatiID($_GET['q']);
}
else{
    dohvatiSve();
}

} 

else{
    
} */

?>
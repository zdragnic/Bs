<?php

session_start(); 
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Greska username ili pass!";
}
else  {
$veza = new PDO("mysql:dbname=beautysalon;host=mysql-55-centos7;charset=utf8", "zerina", "wtspirala4");
$veza->exec("set names utf8");
    
$username= htmlspecialchars($_POST['username']);
$password= htmlspecialchars($_POST['password']);  
     
$query=$veza->prepare("SELECT username, password FROM `korisnici` WHERE `username`=? AND `password`=? ;");
$query->execute([$username, $password]);
$user = $query->fetch();

 if (!$query) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }       

//foreach($rezultati as $korisnik){
//if (strcmp($username ,$korisnik['username']) && strcmp($password, $korisnik['password'])) 
    if($user != FALSE){
$_SESSION['login_user']= $username;
header("location: admin.php");
} 
}

$error = "Greska username ili pass!";
    
}
?>

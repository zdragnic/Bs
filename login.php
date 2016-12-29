<?php

session_start(); 
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Greska username ili pass!";
}
else if (file_exists('Admin.xml')) {

$xml = simplexml_load_file('Admin.xml');
$username=$_POST['username'];
$password=$_POST['password'];
foreach($xml->korisnik as $korisnik){
if ($username==$korisnik->username && $password== $korisnik->password) {
$_SESSION['login_user']=$username;
header("location: admin.php");
} 

else { $error = "Greska username ili pass!"; break; }
}
}
else {$error = "Greska u xml fajlu!";}
}
?>

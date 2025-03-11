<?php
//*****CONNEXION BDD*****
$serveur="localhost";
$user="root";
$pass="Deflagratione89";
$base = "selfy";

try
{
	$dbh = new PDO('mysql:dbname='.$base.';host='.$serveur, $user,$pass);
} 
catch (Exception $e) 
{
	die("Impossible de se connecter: " . $e->getMessage());
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
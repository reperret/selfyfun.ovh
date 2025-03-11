<?php 
include 'api/bdd.php';
include 'api/fonctions.php';
$domaine=explode('.', $_SERVER['HTTP_HOST']);
$domaine=$domaine[0];

$infosEvenements=getDomaine($domaine,NULL,$dbh);
$idEvenement=$infosEvenements['idEvenement'];
if($domaine!="" && $domaine!="www" && $domaine!=NULL && $idEvenement!="" && $domaine!="selfy" )
{
    header('Location:gallerie/?e='.base64_encode($idEvenement));
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SELFY.FUN</title>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png"/>
    
</head>

<body>
    <center><img src="gallerie/images/site/logo.png"></center>
</body>

</html>
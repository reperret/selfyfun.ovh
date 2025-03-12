<?php
include '../api/bdd.php';
include '../api/fonctionsAdmin.php';

if (isset($_GET['idE']) && $_GET['idE'] != '') {
    $photos = getPhotosEvenement($_GET['idE'], $dbh);
}
$listing = $photos['listing'];
$domaineEvenement = $photos['domaineEvenement'];
$listingString = $photos['listingString'];

$commande = 'cd /var/www/selfyfun.ovh/photos && zip /var/www/selfyfun.ovh/archives/' . $domaineEvenement . '.zip ' . $listingString;

$output = shell_exec($commande);
header("Location: https://www.selfyfun.ovh/archives/" . $domaineEvenement . '.zip');

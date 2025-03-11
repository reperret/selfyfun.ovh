<?php
include '../api2/bdd.php';
include '../api2/fonctions.php';
$aucunEvenement=false;
$message=NULL;


//********* PARAM IDEVENEMENT POST****************
$idEvenement=9;

//********* RECUPERATION LISTE PHOTOS EN BDD******
$listePhotos=getListeMontagesParEvenement($idEvenement, $dbh);

?>
<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>RAVIOLADE 2023</title>
  <link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<base href="">
<div id="captioned-gallery">
	<figure class="slider">
        
        
    <?php
    foreach($listePhotos as $image)
    {
    ?>
        <figure>
        <img src="../photos2/<?php echo $image['nomImage'];?>" alt>
        <figcaption><?php echo date_format(date_create($image['dateCreationImage']), 'd/m/Y - H:i:s') ?></figcaption>
        </figure>
    <?php
    }
    ?>
        
        


	</figure>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>

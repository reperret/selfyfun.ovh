<?php 
include '../api/bdd.php';
include '../api/fonctionsUtiles.php';

$listingExemplaires=getExemplaire($idLudotheque,NULL,NULL,$dbh);
$nbResultats=sizeof($listingExemplaires);
   
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Cabane à jeux</title>
</head>
<body>
	<header class="cd-header">
		<h1><img src="../img/logo.png"></h1>
	</header>

	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					<li class="filter"><a class="selected" href="#0" data-type="all">Tous niveaux</a></li>                
                    <?php
                    $difficultesJeu=getDifficultesJeu($dbh);
                    for($i=0;$i<sizeof($difficultesJeu);$i++)
                    {
                        ?><li class="filter" data-filter=".<?php echo $difficultesJeu[$i];?>"><a href="#0" data-type="<?php echo $difficultesJeu[$i];?>"><?php echo $difficultesJeu[$i];?></a></li><?php
                    }
                    ?>
                    
                    
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul>
        <?php
            for($i=0;$i<sizeof($listingExemplaires);$i++)
            {
                ?><li class="mix color-1 check1 radio2 option3 <?php echo $listingExemplaires[$i]['libelleJeu'] ;?> <?php echo $listingExemplaires[$i]['difficulteJeu'] ;?> <?php echo "Littératie".$listingExemplaires[$i]['litteratieJeu'] ;?>"><?php echo $listingExemplaires[$i]['libelleJeu'] ;?></li><?php
            }
        ?>
            
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul>
			<div class="cd-fail-message">Aucun résultat</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Rechercher</h4>
					
					<div class="cd-filter-content">
						<input type="search" placeholder="nom du jeu...">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Check boxes</h4>

             
 
					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".Littératie0" type="checkbox" id="Littératie0">
			    			<label class="checkbox-label" for="Littératie0">Littératie</label>
						</li>

						<li>
							<input class="filter" data-filter=".Littératie1" type="checkbox" id="Littératie1">
			    			<label class="checkbox-label" for="Littératie1">Littératie</label>
						</li>
                        
                        <li>
							<input class="filter" data-filter=".Littératie2" type="checkbox" id="Littératie2">
			    			<label class="checkbox-label" for="Littératie2">Littératie</label>
						</li>
                        
                        <li>
							<input class="filter" data-filter=".Littératie3" type="checkbox" id="Littératie3">
			    			<label class="checkbox-label" for="Littératie3">Littératie</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Age</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="">Choisir un age</option>
								<option value=".option1">Option 1</option>
								<option value=".option2">Option 2</option>
								<option value=".option3">Option 3</option>
								<option value=".option4">Option 4</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Radio buttons</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">Tous les jeux</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Choice 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Choice 3</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
			</form>

			<a href="#0" class="cd-close">Fermer</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filtres</a>
	</main> <!-- cd-main-content -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
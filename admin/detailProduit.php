
<?php 
try {

include 'api/bdd.php';
include 'api/fonctionsUtiles.php';
include 'verifAdmin.php';

$listingTypesProduits=getTypesProduits($dbh);
    
//********RECUPERATION idProduit POST OU GET*******************
$idProduit=NULL;
if(isset($_POST['idP']) && $_POST['idP']!='' ) $idProduit=$_POST['idP'];
if(isset($_GET['idP'])  && $_GET['idP']!=''  ) $idProduit=$_GET['idP'];



//********UPDATE PRODUIT******************************************************
$returnUpdateProduit=-1;
if(isset($_POST['updateProduit']) && $_POST['updateProduit']==1)
{
    //********CREATION D'UN NOUVEAU PRODUIT**********
    if(isset($_POST['c']) && $_POST['c']==1)
    {
        $idProduit=creerProduit($dbh);
    }

    //********UPDATE PRODUIT**********
    $parametres=array();
    $parametres['idProduit']=$idProduit;
    $parametres['idTypeProduit']=$_POST['idTypeProduit'];
    $parametres['raccourciProduit']=$_POST['raccourciProduit'];
    if($_POST['libelleProduit']=='' || $_POST['libelleProduit']=='')
    {
        $parametres['libelleProduit']='NOUVEAU PRODUIT';
    }
    else
    {
        $parametres['libelleProduit']=$_POST['libelleProduit'];
    }
    $parametres['tvaProduit']=$_POST['tvaProduit'];
    $parametres['prixProduit']=$_POST['prixProduit'];
    if($_POST['nbJoursProduit']==0 || $_POST['nbJoursProduit']=="")
    {
        $parametres['nbJoursProduit']=NULL;
    }
    else
    {
        $parametres['nbJoursProduit']=$_POST['nbJoursProduit'];    
    }
    
    $returnUpdateProduit=updateProduit($parametres,$dbh); 
}

if(!(isset($_GET['c']) && $_GET['c']==1))
{
    $detailProduit=getDetailProduit($idProduit,$dbh);
}






?>
<!DOCTYPE html>
<html lang="fr">


<!-- Mirrored from www.ansonika.com/findoctor/admin_section/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jan 2019 15:12:29 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>GPSPORT - GPTRANSPORT  - ADMIN</title>
	
  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Plugin styles -->
  <link href="vendor/animate.min.css" rel="stylesheet">
  <link href="vendor/magnific-popup.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="css/admin.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/admin.css" rel="stylesheet">
      <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
    
   <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
    
      <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <script>

    function verifierChamps()
    {
       alert("Verif à faire");
    }
    
    </script>
    

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    
    <?php include 'nav.php';?>
    
    
  <div class="content-wrapper">
    <div class="container-fluid">
        <form action="detailProduit.php" method="POST" onsubmit = "return verifierChamps();">
        
 
            
        

        <?php if($returnUpdateProduit==1){ ?><div class="alert alert-success" role="alert">Mise à jour réussie</div><?php } ?>
        <?php if($returnUpdateProduit==0){ ?><div class="alert alert-danger" role="alert">La mise à jour a échoué. Veuillez recommencer</div><?php } ?>
        
		<div class="box_general padding_bottom">
			<div class="header_box version_2">    
				<h2><i class="fa fa-id-card-o"></i>Détail du produit</h2><br>
			</div>
			<div class="row">
		
				<div class="col-md-12 add_top_30">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Libellé</label>
								<input type="text" class="form-control" name="libelleProduit" value="<?php echo $detailProduit['libelleProduit'];?>" style="color:#000000; font-weight:bold">
							</div>
						</div>
                        
                        <div class="col-md-6">
							<div class="form-group">
								<label>Raccourci</label>
								<input type="text" class="form-control" name="raccourciProduit" value="<?php echo $detailProduit['raccourciProduit'];?>" style="color:#000000; font-weight:bold">
							</div>
						</div>
                        
                        <div class="col-md-2">
							<div class="form-group">
								<label>Prix</label>
								<input type="text" class="form-control" name="prixProduit" value="<?php echo $detailProduit['prixProduit'];?>" style="color:#d03100; font-size:1.6em;font-weight:bold; padding:4px;">
							</div>
						</div>
                        
                        <div class="col-md-1">
							<div class="form-group">
								<label>TVA</label>
								<input type="text" class="form-control" name="tvaProduit" value="<?php echo $detailProduit['tvaProduit'];?>">
							</div>
						</div>
                        
                            <div class="col-md-1">
							<div class="form-group">
								<label>Nb jours loc</label>
								<input type="text" class="form-control" name="nbJoursProduit" value="<?php echo $detailProduit['nbJoursProduit'];?>">
							</div>
						</div>
                        
						<div class="col-md-2">
							<div class="form-group">
								<label>Type Produit</label>
				           <select class="form-control" name="idTypeProduit" id="idTypeProduit">
                        <?php
                        for($i=0;$i<sizeof($listingTypesProduits);$i++)
                        {
                        ?>
                            <option value="<?php echo $listingTypesProduits[$i]['idTypeProduit'];?>" <?php if($listingTypesProduits[$i]['idTypeProduit']==$detailProduit['idTypeProduit']) echo " selected";?>><?php echo $listingTypesProduits[$i]['libelleTypeProduit'];?></option>
                            <?php
                        }
                        ?> 
                            </select>
							</div>
						</div>

					</div>
					<!-- /row-->
				
                    
				</div>
			</div>
		</div>
		<!-- /box_general-->
        
            
		<!-- /row-->
        <input type="hidden" name="updateProduit" value="1">
        <input type="hidden" name="idP" value="<?php echo $idProduit;?>">
        <?php
        $libelleBouton="METTRE A JOUR";
        if(isset($_GET['c']) && $_GET['c']==1)
        {
            $libelleBouton="CREER LE PRODUIT";
           ?> <input type="hidden" name="c" value="1"><?php
        }
        ?>
        
		<center><p><button type="submit" class="btn_1 medium" style="background-color:#000 !important; hover" accesskey="s"><?php echo $libelleBouton;?></button></p></center>
    
      </form>
        
        
    </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
  
       <?php include 'footer.php';?>
    
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/jquery.selectbox-0.2.js"></script>
	<script src="vendor/retina-replace.min.js"></script>
	<script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
	<!-- Custom scripts for this page-->
    <script src="js/admin-datatables.js"></script>
    

	
</body>

<!-- Mirrored from www.ansonika.com/findoctor/admin_section/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jan 2019 15:12:31 GMT -->
</html>

<?php
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
<?php 
try {

include 'api/bdd.php';
include 'api/fonctionsUtiles.php';
include 'verifAdmin.php';
    
$returnArchivageProduit=-1;
if(isset($_POST['archiveProduit']) && $_POST['archiveProduit']!="" && isset($_POST['idProduit']) && $_POST['idProduit']!="")
{
    $returnArchivageProduit=archiverProduit($_POST['idProduit'],$_POST['archiveProduit'],$dbh);
}
    
$listingTypesProduits=getTypesProduits($dbh);
$listingProduitsCommande=getProduits($dbh);
    


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
    
    <style>
        .vert{background-color: forestgreen !important}
    </style>
    
    <script>

         $(document).ready( function () 
        {
            var table = $('#dataTable').DataTable();
            $("#idTypeProduitTOUT").click(function() 
            {
                table.search("").draw();
                 $('html,body').animate({
        scrollTop: $(".content").offset().top},
        'slow');
            });
        } );
        
        $(document).ready( function () 
        {
            var table = $('#dataTable').DataTable();
            $("#archive").click(function() 
            {
                table.search("Archivé").draw();
                 $('html,body').animate({
        scrollTop: $(".content").offset().top},
        'slow');
            });
        } );
        
    <?php
    for($i=0;$i<sizeof($listingTypesProduits);$i++)
    {
        ?>
        $(document).ready( function () 
        {
            var table = $('#dataTable').DataTable();
            $("#idTypeProduit<?php echo $listingTypesProduits[$i]['idTypeProduit'];?>").click(function() 
            {
                table.search("<?php echo $listingTypesProduits[$i]['libelleTypeProduit'];?>").draw();
                 $('html,body').animate({
        scrollTop: $(".content").offset().top},
        'slow');
            });
        } );
      
        <?php
    }
    ?>

    </script>
    

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    
    <?php include 'nav.php';?>
    
    
  <div class="content-wrapper">
    <div class="container-fluid">
   
		
        <?php if($returnArchivageProduit==1){ ?><div class="alert alert-success" role="alert">Le produit a bien été archivé</div><?php } ?>
        <?php if($returnArchivageProduit==0){ ?><div class="alert alert-danger" role="alert">L'archivage du produit a échoué. Veuillez recommencer</div><?php } ?>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-edit"></i>Liste des produits </h2>  
                <p style="display: inline;margin:0 !important;padding:0 !important"><a href="detailProduit.php?c=1" data-effect="mfp-zoom-in" class="btn_1 gray">Créer un produit</a></p>
                <div class="content"></div>
            </div>

            
                      <div class="card-body">
                           <a href="#" id="idTypeProduitTOUT" class="btn btn-secondary btn-sm">TOUT</a> 
                          <a href="#" id="archive" class="btn btn-secondary btn-sm">ARCHIVE</a> 
                          <?php
                        for($i=0;$i<sizeof($listingTypesProduits);$i++)
                        {
                            ?>
                            <a href="#" id="idTypeProduit<?php echo $listingTypesProduits[$i]['idTypeProduit'];?>" class="btn btn-secondary btn-sm"><?php echo $listingTypesProduits[$i]['libelleTypeProduit'];?></a> 
                            <?php
                        }
                        ?>

          </div>
            
            
            <div class="row">                       
                <div class="table-responsive">
        <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

                <th>Type</th>
                <th>Produit</th>
                <th>Racc.</th>
                <th>Durée J</th>
                <th>Prix</th>
                <th>Tva</th>
                <th>Archive</th>
                <th>Actions</th>
    
            </tr>
          </thead>
          <tfoot>
            <tr>
            <tr>
                <th>Type</th>
                <th>Produit</th>
                 <th>Racc.</th>
                <th>Durée J</th>
                <th>Prix</th>
                <th>Tva</th>
                <th>Archive</th>
                <th>Actions</th>
               

            </tr>
          </tfoot>
          <tbody>

              <?php
              for($i=0;$i<sizeof($listingProduitsCommande);$i++)
              {  
              ?>

            <tr>
                <td><?php echo $listingProduitsCommande[$i]['libelleTypeProduit'] ;?></td>
                <td><a href="detailProduit.php?idP=<?php echo $listingProduitsCommande[$i]['idProduit'] ;?>"><?php echo $listingProduitsCommande[$i]['libelleProduit'] ;?></a></td>
                <td><?php echo $listingProduitsCommande[$i]['raccourciProduit'] ;?></td>
                <td><?php echo $listingProduitsCommande[$i]['nbJoursProduit']  ; ?></td>
                <td><?php echo $listingProduitsCommande[$i]['prixProduit'] ;?></td>
                <td><?php echo $listingProduitsCommande[$i]['tvaProduit'] ;?>%</td>
                <td><?php if($listingProduitsCommande[$i]['archiveProduit']==1) echo "Archivé" ;?></td>
                <td>
                <form action="produits.php" method="POST">
                    <input type="hidden" value="<?php echo $listingProduitsCommande[$i]['idProduit'] ;?>" name="idProduit">
                    <input type="hidden" value="<?php echo $listingProduitsCommande[$i]['archiveProduit'] ;?>" name="archiveProduit">
                    <?php
                    $libelleBouton="ARCHIVER";
                    $boutonVert=NULL;
                    if($listingProduitsCommande[$i]['archiveProduit']==1)
                    {
                        $libelleBouton="DESARCHIVER";
                        $boutonVert="vert";
                    }
                    ?>
                    <button type="submit" class="btn btn-secondary btn-sm <?php echo $boutonVert;?>"><?php echo $libelleBouton;?></a>     
                </form>
                </td>
            </tr>

              <?php  
              }
              ?>

          </tbody>
        </table>
      </div>
            </div>
        </div>
            
        
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
    
    

    
    
        <script>
    $('#dataTable').dataTable( {
          "order": [[ 0, "desc" ],[ 5, "asc" ]],
      "iDisplayLength": 10,
              
 <?php if(isset($_GET['empruntable']) &&  $_GET['empruntable']==1)
{?>
        
  "search": 
        {
            "search": "Empruntable"
        },
        
            
<?php
}

?>
        
        
        
} );
            
    
            
            
    </script>


    
    
	
</body>

<!-- Mirrored from www.ansonika.com/findoctor/admin_section/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jan 2019 15:12:31 GMT -->
</html>

<?php
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
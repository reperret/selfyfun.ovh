<?php 
include 'api/bdd.php';
include 'api/fonctionsUtiles.php';
include 'verifAdmin.php';

$dateDebut=NULL;
$dateFin=NULL;
$type=NULL;
$listingAvoir=getAvoirs($dateDebut,$dateFin,$dbh);

?>
<!DOCTYPE html>
<html lang="fr">

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


    
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  
    <?php include 'nav.php';?>
    
    
    
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>-->
		<!-- Example DataTables Card-->
        
        
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-edit"></i>Avoirs </h2> 
                <p style="display: inline;margin:0 !important;padding:0 !important"><a href="avoir.php" data-effect="mfp-zoom-in" class="btn_1 gray">Créer un avoir</a></p>
                <div class="content"></div>
            </div>



 
            <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" style="font-size:1em" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                 
                    
                    
                    <th style="width:15%;">Nom</th>
                    <th>Adresse</th>
                    <th>Description</th>
                    <th>Montant</th>
                    <th>TVA</th>
                    <th>Date</th>
                    <th>PDF</th>
                    
                </tr>
              </thead>
              <tfoot>
                <tr>
                      
                    
                    
                    
                         <th style="width:15%;">Nom</th>
                    <th>Adresse</th>
                    <th>Description</th>
                    <th>Montant</th>
                    <th>TVA</th>
                    <th>Date</th>
                    <th>PDF</th>
                </tr>
              </tfoot>
              <tbody>
                  
                  <?php
                  for($i=0;$i<sizeof($listingAvoir);$i++)
                  {

                  ?>
 
                <tr>
                    
                    <td><?php echo $listingAvoir[$i]['nomAvoir']." ".$listingAvoir[$i]['prenomAvoir'];?></td>
                    <td><?php echo $listingAvoir[$i]['adresseAvoir'];?></td>
                    <td><?php echo $listingAvoir[$i]['descriptionAvoir'];?></td>
                    <td><?php echo $listingAvoir[$i]['montantAvoir'];?></td>
                    <td><?php echo $listingAvoir[$i]['tvaAvoir'];?></td>
                    <td><?php echo $listingAvoir[$i]['dateAvoir'];?></td>
                
                    <td><a href="facturation/examples/avoir.php?idA=<?php echo $listingAvoir[$i]['idAvoir'];?>"  class="btn_1 gray"  target="_blank" ><i class="fa fa-fw fa-eye"></i></a></td>
                    
                </tr>
                  
                  <?php
                  }
                  ?>
                
              </tbody>
            </table>

          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
	  <!-- /tables-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
    
   
    
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
          "order": [[ 6, "desc" ]],
      "iDisplayLength": 100,
              
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

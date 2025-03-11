
<?php 
try {

include 'api/bdd.php';
include 'api/fonctionsUtiles.php';
include 'verifAdmin.php';


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
    

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    
    

    <?php include 'nav.php';?>
    
    
  <div class="content-wrapper">
    <div class="container-fluid">
        <form action="csv.php" method="POST">

            
               <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-edit"></i>Export complet (GPSport et GpTransport)</h2>  
                <div class="content"></div>
            </div>

           			<div class="row">
		
                        <p> Sans remplir de dates, l'export contiendra les données depuis toujours et jusqu'à jamais :)</p>
            
				<div class="col-md-12 add_top_30">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Début</label>
								<input type="text" class="form-control" name="dateDebut">
							</div>
						</div>
                        
                        <div class="col-md-2">
							<div class="form-group">
								<label>Fin</label>
								<input type="text" class="form-control" name="dateFin" >
							</div>
						</div>
                        
                           <div class="col-md-2">
							<div class="form-group">
                                
                                <div>
                                    <input type="radio" name="typeMagasin" value="GPTransports" checked>
                                    <label>Transport</label>
                                </div>  
                                
                                <div>
                                    <input type="radio" name="typeMagasin" value="GPSport" >
                                    <label>Sport</label>
                                </div>

                                   
							</div>
						</div>
                        
                
                        


					</div>
					<!-- /row-->
  
				</div>
			</div>
         
      
        </div>
            

            
		<center><p><button type="submit" class="btn_1 medium" style="background-color:#000 !important; hover" accesskey="s">EXPORTER</button></p></center>
    
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
    
    

    
    
        <script>
    $('#dataTable').dataTable( {
          "order": [[ 0, "desc" ]],
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
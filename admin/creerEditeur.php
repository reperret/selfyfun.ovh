<?php 
include 'api/bdd.php';
include 'api/fonctionsUtiles.php';
include 'verifAdmin.php';
$return=NULL;

//********RECUPERATION IDADHERENTPARAMETRE POST OU GET*******************
$idExemplaire=NULL;
if(isset($_POST['idE']) && $_POST['idE']!='' ) $idExemplaire=$_POST['idE'];
if(isset($_GET['idE'])  && $_GET['idE']!=''  ) $idExemplaire=$_GET['idE'];



//********REDIRECTION ERREUR SI PARAMETRE ERRONE*****************************
if($idExemplaire==NULL)
{
    $return='Location: erreur.php';
}

//********CREATION D'UN EDITEUR*****************************
$returnCreateEditeur=-1;
if(   isset($_POST['createEditeur'])  && $_POST['createEditeur']==1  && isset($_POST['libelleEditeur']) && $_POST['libelleEditeur']!='')
{
    $returnCreateEditeur=createEditeur($_POST['libelleEditeur'], $dbh);
    if($returnCreateEditeur==1)
    {
        $return='Location: detailJeu.php?idE='.$idExemplaire;
    }
    else
    {
         $return='ERROR';
    }
}

if($return!=NULL && $return!='ERROR')
{
   header($return);
    exit(); 
}


?>
<!DOCTYPE html>
<html lang="fr">


<!-- Mirrored from www.ansonika.com/findoctor/admin_section/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jan 2019 15:12:29 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GpSport - MegeveCab - Admin</title>
	
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
  <link href="vendor/dropzone.css" rel="stylesheet">
          <!-- Plugin styles -->
  <link href="vendor/animate.min.css" rel="stylesheet">
  <link href="vendor/magnific-popup.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="css/admin.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
    
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
              
        <?php if($returnCreateEditeur==0){ ?><div class="alert alert-danger" role="alert">La création a échoué. Veuillez recommencer</div><?php } ?>
              
     <div class="box_general padding_bottom">
			<div class="header_box version_2">
                <h2><i class="fa fa-id-card-o"></i>Créer un nouvel éditeur</h2>
			</div>
			<div class="row">
				<div class="col-md-4">
                    
              
					<div class="row">
                        
        <form action="creerEditeur.php" method="post">
             
                        
						<div class="col-md-12">
							<div class="form-group">
								<label>Libellé éditeur</label>
								<input type="text" class="form-control" name="libelleEditeur">
							</div>
						</div>
					
               
              
            <input type="hidden" name="createEditeur" value="1">
            <input type="hidden" name="idE" value="<?php echo $idExemplaire;?>">
              <button type="submit" class="btn btn-secondary">Créer l'éditeur</button>
          </form>
                        
                        
                        
                 
                       
					</div>
					<!-- /row-->
				
                    

                    
                    
		
                    
                    
                    
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
	<script src="vendor/dropzone.min.js"></script>
    
	<!-- Custom scripts for this page-->
    <script src="js/admin-datatables.js"></script>
	
</body>

<!-- Mirrored from www.ansonika.com/findoctor/admin_section/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jan 2019 15:12:29 GMT -->
</html>

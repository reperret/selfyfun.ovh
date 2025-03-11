<?php 
try
{
    
include '../api2/bdd.php';
include '../api2/fonctionsAdmin.php';
include 'verifAdmin.php';
$confirmationAction=NULL;
$parametres=array();

$idM=NULL;
//**************INSERT REGLAGE****************************
if(isset($_GET['c']) && $_GET['c']=="1")
{
    $idM=insertReglage($dbh);
}
//**************************************************************  
    

if(isset($_GET['idM']) && $_GET['idM']!='') $idM=$_GET['idM'];
    
//**************DELETE REGLAGE************************
if(isset($_GET['d']) && $_GET['d']=="1" && isset($_GET['idReglagePhoto']) && $_GET['idReglagePhoto']!='' )
{
    $deleteReglage=deleteReglage($_GET['idReglagePhoto'],$dbh);
    $confirmationAction="Le réglage a bien été supprimé";
    $idM=$_GET['idM'];
}
//**************************************************************  


    
//**************UPDATE REGLAGE****************************
if(isset($_POST['u']) && $_POST['u']=="1" && isset($_POST['idReglagePhoto']) && $_POST['idReglagePhoto']!='' )
{
    
    foreach($_POST as $key=>$value)
    {
        if($key!="u" && $key!="idReglagePhoto" && $key!="dataTable_length" ) $parametres[$key]=$value;
    }
    
    $updateReglage=updateReglage($_POST['idReglagePhoto'],$parametres,$dbh);
    $confirmationAction="Le réglage a bien été modifié";
}
//**************************************************************  

$listingReglages=getReglages("ALL",$dbh);
    

  
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>SELFY.FUN - ADMIN</title>

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
    <link href="css/custom.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <script>
        function confirmerAction() {
            return confirm("Confirmer action ?");
        }

    </script>

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
                    <h2><i class="fa fa-edit"></i>Réglages Photo </h2>
                    <p style="display: inline;margin:0 !important;padding:0; padding-left:20px !important"><a href="reglages.php?c=1" data-effect="mfp-zoom-in" class="btn_1 gray">créer</a></p>
                    <div class="content"></div>
                </div>

                <!--      <div id="filtresPerso">
<form action="exemplaires.php" method="post">
    <input type="checkbox" value="1" name="actifs" onChange="this.form.submit()" <?php if($actifs==1) echo " checked";?> >
    Actifs
    
    <input type="checkbox" value="1" name="hs" onChange="this.form.submit()" <?php if($hs==1) echo " checked";?> >
    HS
    
    <input type="checkbox" value="1" name="areparer" onChange="this.form.submit()" <?php if($areparer==1) echo " checked";?> >
    A réparer
</form>
                  </div>-->


                <div class="card-body">

                    <div class="table-responsive">
                        <?php if($confirmationAction!="") echo "<h1>".$confirmationAction."</h1>";?>
                        <form action="reglages.php" method="POST" id="updateReglage">

                            <table class="table table-bordered" style="font-size:1em" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Libellé</th>
                                        <th>Contraste</th>
                                        <th>Luminosité</th>
                                        <th>Qualité</th>
                                        <th>Modif.</th>
                                        <th>Supp.</th>
                                    </tr>
                                </thead>
                                <!--<tfoot>
                <tr>
                    <th>Titre</th>
                    <th>Domaine</th>
                    <th>DateEvenement</th>
                    <th>Couleur Princ.</th>
                    <th>Couleur Secon.</th>
                    <th>Modif.</th>
                    <th>Supp.</th>
                </tr>
              </tfoot>-->
                                <tbody>

                                    <?php
                  for($i=0;$i<sizeof($listingReglages);$i++)
                  {

                      
                      if($idM==$listingReglages[$i]['idReglagePhoto'])
                      {
                        ?>


                                    <tr>
                                        <td><input type="text" value="<?php echo $listingReglages[$i]['libelleReglagePhoto'] ;?>" name="libelleReglagePhoto"></td>
                                        <td><input type="text" value="<?php echo $listingReglages[$i]['contrastReglagePhoto'] ;?>" name="contrastReglagePhoto"></td>
                                        <td><input type="text" value="<?php echo $listingReglages[$i]['brightnessReglagePhoto'] ;?>" name="brightnessReglagePhoto"></td>
                                        <td><input type="text" value="<?php echo $listingReglages[$i]['qualityReglagePhoto'] ;?>" name="qualityReglagePhoto"></td>
                                        <td><input type="submit" class="btn_1" value="ENR."></td>
                                        <td><a href="reglages.php?d=1&idReglagePhoto=<?php echo $listingReglages[$i]['idReglagePhoto'] ;?>" class="btn_1 gray"><i class="fa fa-fw fa-trash"></i></a></td>
                                    </tr>


                                    <?php  
                      }
                      else
                      {
                        ?>
                                    <tr>
                                        <td><?php echo $listingReglages[$i]['libelleReglagePhoto'] ;?></td>
                                        <td><?php echo $listingReglages[$i]['contrastReglagePhoto'] ;?></td>
                                        <td><?php echo $listingReglages[$i]['brightnessReglagePhoto'] ;?></td>
                                        <td><?php echo $listingReglages[$i]['qualityReglagePhoto'] ;?></td>
                                        <td><a href="reglages.php?idM=<?php echo $listingReglages[$i]['idReglagePhoto'] ;?>" class="btn_1 gray"><i class="fa fa-fw fa-pencil"></i></a></td>
                                        <td><a href="reglages.php?d=1&idReglagePhoto=<?php echo $listingReglages[$i]['idReglagePhoto'] ;?>" onclick="return confirmerAction()" class="btn_1 gray"><i class="fa fa-fw fa-trash"></i></a></td>
                                    </tr>
                                    <?php  
                          
                      }
                  ?>




                                    <?php
                  }
                  ?>

                                </tbody>
                            </table>
                            <input type="hidden" name="u" value="1">
                            <input type="hidden" name="idReglagePhoto" value="<?php echo $idM ;?>">
                        </form>
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

</body>

</html>
<?php
} catch (Exception $e) 
{
    echo 'Exception : ',  $e->getMessage(), "\n";
}
?>

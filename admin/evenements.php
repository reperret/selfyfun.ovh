<?php
try {


    include '../api2/bdd.php';
    include '../api2/fonctionsAdmin.php';
    include 'verifAdmin.php';


    //**************CHANGEMENT STATUT ACTIF/INACTIF EVENEMENT*******
    if (isset($_GET['idE']) && $_GET['idE'] != '' && isset($_GET['idA']) && $_GET['idA'] != '') {
        $updateActifEvenement = updateActifEvenement($_GET['idE'], $_GET['idA'], $dbh);
    }
    //**************************************************************      


    $idM = NULL;
    //**************INSERT EVENEMENT****************************
    if (isset($_GET['c']) && $_GET['c'] == "1") {
        $idM = insertEvenement($dbh);
    }
    //**************************************************************  



    //**************DELETE EVENEMENT************************
    if (isset($_GET['d']) && $_GET['d'] == "1" && isset($_GET['idEvenement']) && $_GET['idEvenement'] != '') {
        $deleteEvenement = deleteEvenement($_GET['idEvenement'], $dbh);
        $confirmationAction = "L'évènement a bien été supprimé";
    }
    //**************************************************************  


    if (isset($_GET['idM']) && $_GET['idM'] != '') $idM = $_GET['idM'];

    //**************UPDATE EVENEMENT****************************
    if (isset($_POST['u']) && $_POST['u'] == "1" && isset($_POST['idEvenement']) && $_POST['idEvenement'] != '') {
        // if($_FILES['templateEvenementNew']['size'] >0) $templateEvenementNew=uploadTemplate('./api2/templates/','templateEvenementNew',1);

        foreach ($_POST as $key => $value) {
            if ($key != "u" && $key != "idEvenement" && $key != "dataTable_length") $parametres[$key] = $value;
        }
        //if($templateEvenementNew['nomTemplate']!="" && $templateEvenementNew['codeErreur']!="SUCCESS") $parametres["templateEvenement"]=$templateEvenementNew['nomTemplate'];

        print_r($parametres);
        $updateEvenement = updateEvenement($_POST['idEvenement'], $parametres, $dbh);
        $confirmationAction = "L'évènement a bien été modifié";
    }
    //**************************************************************  


    //************RECUPARATION DES DONNEES**************************
    $appareils = getAppareils("ALL", $dbh);
    $listingEvenements = getEvenements("ALL", $dbh);
    //**************************************************************  




    //************************************************************************
    //*****************TELECHARGEMENT DU ZIP**********************************
    //************************************************************************
    if (isset($_GET['idE']) && $_GET['idE'] != '' && isset($_GET['getArchive']) && $_GET['getArchive'] == 1) {
        $photos = getPhotosEvenement($_GET['idE'], $dbh);
        $listing = $photos['listing'];
        $domaineEvenement = $photos['domaineEvenement'];
        $listingString = $photos['listingString'];

        $commande = 'cd /var/www/selfyfun.ovh/photos2 && zip /var/www/selfyfun.ovh/archives/' . $domaineEvenement . '.zip ' . $listingString;

        $output = shell_exec($commande);
        header("Location: https://www.selfyfun.ovh/archives/" . $domaineEvenement . '.zip');
    }
    //************************************************************************
    //*****************FIN TELECHARGEMENT DU ZIP******************************
    //************************************************************************

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>SELFYFUN.OVH - ADMIN</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <script>
    function confirmerAction() {
        return confirm("Confirmer action ?");
    }
    </script>


</head>

<body class="fixed-nav sticky-footer" id="page-top">

    <?php include 'nav.php'; ?>



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
                    <h2><i class="fa fa-edit"></i>Evènements <?php print_r($templateEvenementNew); ?> </h2>
                    <p style="display: inline;margin:0 !important;padding:0; padding-left:20px !important"><a
                            href="evenements.php?c=1" data-effect="mfp-zoom-in" class="btn_1 gray">créer</a></p>
                    <div class="content"></div>
                </div>

                <!--      <div id="filtresPerso">
<form action="exemplaires.php" method="post">
    <input type="checkbox" value="1" name="actifs" onChange="this.form.submit()" <?php if ($actifs == 1) echo " checked"; ?> >
    Actifs
    
    <input type="checkbox" value="1" name="hs" onChange="this.form.submit()" <?php if ($hs == 1) echo " checked"; ?> >
    HS
    
    <input type="checkbox" value="1" name="areparer" onChange="this.form.submit()" <?php if ($areparer == 1) echo " checked"; ?> >
    A réparer
</form>
                  </div>-->


                <div class="card-body">
                    <div class="table-responsive">
                        <form action="evenements.php" method="POST" id="updateEvenement" enctype="multipart/form-data">
                            <table class="table table-bordered" style="font-size:1em" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Titre 2</th>
                                        <th>Appareil</th>
                                        <th>Domaine</th>
                                        <th>DateEvenement</th>
                                        <th>Coul1</th>
                                        <th>Coul2</th>
                                        <th>Template</th>
                                        <th>Actions</th>
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
                                        for ($i = 0; $i < sizeof($listingEvenements); $i++) {

                                        ?>

                                    <tr>
                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?><input type="text" name="titreEvenement"
                                                value="<?php echo $listingEvenements[$i]['titreEvenement']; ?>"><?php
                                                                                                                        } else {
                                                                                                                            echo $listingEvenements[$i]['titreEvenement'];
                                                                                                                        }
                                                                                                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?><input type="text" name="titre2Evenement"
                                                value="<?php echo $listingEvenements[$i]['titre2Evenement']; ?>"><?php
                                                                                                                            } else {
                                                                                                                                echo $listingEvenements[$i]['titre2Evenement'];
                                                                                                                            }
                                                                                                                                ?>
                                        </td>

                                        <td>
                                            <select name="idAppareil"
                                                <?php if ($idM != $listingEvenements[$i]['idEvenement']) echo " disabled"; ?>>
                                                <?php
                                                        foreach ($appareils as $appareil) {
                                                        ?><option value="<?php echo $appareil['idAppareil']; ?>"
                                                    <?php if ($appareil['idAppareil'] == $listingEvenements[$i]['idAppareil']) echo " selected"; ?>>
                                                    <?php echo $appareil['titreAppareil']; ?></option><?php
                                                                                                                }
                                                                                                                    ?>
                                            </select>
                                            <?php if ($listingEvenements[$i]['actifEvenement'] == 1) {
                                                    ?><img src="img/on.png"><?php
                                                        } else {
                                                            ?><a
                                                href="evenements.php?idE=<?php echo $listingEvenements[$i]['idEvenement']; ?>&idA=<?php echo $listingEvenements[$i]['idAppareil']; ?>"><img
                                                    src="img/off.png"></a><?php
                                                                                    } ?>
                                        </td>
                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?><input type="text" name="domaineEvenement"
                                                value="<?php echo $listingEvenements[$i]['domaineEvenement']; ?>">.selfyfun.ovh<?php
                                                                                                                                        } else {
                                                                                                                                            ?><a
                                                href="https://<?php echo $listingEvenements[$i]['domaineEvenement']; ?>.selfyfun.ovh"
                                                target="_blank"><strong><?php echo $listingEvenements[$i]['domaineEvenement']; ?></strong>.selfyfun.ovh</a><?php
                                                                                                                                                                    }
                                                                                                                                                                        ?>


                                        </td>
                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?><input type="text" name="dateEvenement"
                                                value="<?php echo $listingEvenements[$i]['dateEvenement']; ?>"><?php
                                                                                                                        } else {
                                                                                                                            echo $listingEvenements[$i]['dateEvenement'];
                                                                                                                        }
                                                                                                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?>
                                            <input type="color" id="couleurPrincipaleEvenement"
                                                name="couleurPrincipaleEvenement"
                                                value="<?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>">
                                            <!-- <div class='outer-div' style="background-color:<?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>">
                                <div class='middle-div' style="background-color:<?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>">
                                    <?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>
                                </div> 
                            </div>-->
                                            <?php
                                                    } else {
                                                    ?>
                                            <input type="color"
                                                value="<?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>">
                                            <!-- <div class='outer-div' style="background-color:<?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>">
                                <div class='middle-div' style="background-color:<?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>">
                                    <?php echo $listingEvenements[$i]['couleurPrincipaleEvenement']; ?>
                                </div> 
                            </div>-->
                                            <?php
                                                    }
                                                    ?>


                                        </td>

                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?>
                                            <input type="color" id="couleurSecondaireEvenement"
                                                name="couleurSecondaireEvenement"
                                                value="<?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>">
                                            <!-- <div class='outer-div' style="background-color:<?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>">
                                <div class='middle-div' style="background-color:<?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>">
                                    <?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>
                                </div> 
                            </div>-->
                                            <?php
                                                    } else {
                                                    ?>
                                            <input type="color"
                                                value="<?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>">
                                            <!-- <div class='outer-div' style="background-color:<?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>">
                                <div class='middle-div' style="background-color:<?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>">
                                    <?php echo $listingEvenements[$i]['couleurSecondaireEvenement']; ?>
                                </div> 
                            </div>-->
                                            <?php
                                                    }
                                                    ?>
                                        </td>





                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?>
                                            <select name="templateEvenement"
                                                <?php if ($idM != $listingEvenements[$i]['idEvenement']) echo " disabled"; ?>>
                                                <?php
                                                            $dir    = '../api2/templates';
                                                            $files2 = scandir($dir, 1);
                                                            foreach ($files2 as $file) {
                                                                if ($file != '.' && $file != '..') {


                                                            ?><option value="<?php echo $file; ?>"
                                                    <?php if ($file == $listingEvenements[$i]['templateEvenement']) echo " selected"; ?>>
                                                    <?php echo $file; ?></option><?php
                                                                                                }
                                                                                            }
                                                                                                    ?>
                                            </select>
                                            <?php
                                                    } else {
                                                    ?>
                                            <!--<a href="showPicture.php?idE=<?php echo $listingEvenements[$i]['idEvenement']; ?>&t=templateEvenement" target="_blank"><img src="data:image/png;base64,<?php echo $listingEvenements[$i]['templateEvenement']; ?>" width="100px"></a> -->

                                            <a
                                                href="../api2/templates/<?php echo $listingEvenements[$i]['templateEvenement']; ?>"><img
                                                    src="../api2/templates/<?php echo $listingEvenements[$i]['templateEvenement']; ?>"
                                                    width="100px"></a>
                                            <?php
                                                    }
                                                    ?>


                                        </td>

                                        <td>
                                            <?php
                                                    if ($idM == $listingEvenements[$i]['idEvenement']) {
                                                    ?><input type="submit" class="btn_1" value="ENR."><?php
                                                                        } else {
                                                                            ?><a
                                                href="evenements.php?idE=<?php echo $listingEvenements[$i]['idEvenement']; ?>&getArchive=1"
                                                target="_blank" class="btn_1 gray"><i
                                                    class="fa fa-fw fa-download"></i></a>
                                            <a href="evenements.php?idM=<?php echo $listingEvenements[$i]['idEvenement']; ?>"
                                                class="btn_1 gray"><i class="fa fa-fw fa-pencil"></i></a>
                                            <a href="evenements.php?d=1&idEvenement=<?php echo $listingEvenements[$i]['idEvenement']; ?>"
                                                class="btn_1 gray" onclick="return confirmerAction()"><i
                                                    class="fa fa-fw fa-trash"></i></a><?php
                                                                                                }
                                                                                                    ?>



                                        </td>

                                    </tr>

                                    <?php
                                        }
                                        ?>

                                </tbody>
                            </table>

                            <input type="hidden" name="u" value="1">
                            <input type="hidden" name="idEvenement" value="<?php echo $idM; ?>">
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



    <?php include 'footer.php'; ?>


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
} catch (Exception $e) {
    echo 'Exception : ',  $e->getMessage(), "\n";
}
?>
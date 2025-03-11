<?php 
include 'api2/bdd.php';
include 'api2/fonctions.php';
$domaine=explode('.', $_SERVER['HTTP_HOST']);
$domaine=$domaine[0];

$infosEvenements=getDomaine($domaine,NULL,$dbh);
$idEvenement=$infosEvenements['idEvenement'];
if($domaine!="" && $domaine!="www" && $domaine!=NULL && $idEvenement!="" && $domaine!="selfy" )
{
    header('Location:gallerie/?e='.base64_encode($idEvenement));
    exit;
}





//*****************************************************************
//*****************************************************************
//*********************ENVOI MESSAGES******************************
//*****************************************************************
//*****************************************************************
function isValid($code, $ip = null)
{
    if (empty($code)) {
        return false; // Si aucun code n'est entré, on ne cherche pas plus loin
    }
    $params = [
        'secret'    => '6LfuNqMeAAAAAFBanh2FGB8X6nZ9E_LLWQAHOaES',
        'response'  => $code
    ];
    if( $ip ){
        $params['remoteip'] = $ip;
    }
    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
    if (function_exists('curl_version')) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Evite les problèmes, si le ser
        $response = curl_exec($curl);
    } else {
        // Si curl n'est pas dispo, un bon vieux file_get_contents
        $response = file_get_contents($url);

    }

    if (empty($response) || is_null($response)) {
        return false;
    }

    $json = json_decode($response);
    return $json->success;
}



$messageConfirmation=NULL;
$verifierCaptcha=NULL;
if(isset($_POST['contact']) && $_POST['contact']==1)
{
    
    
    
    if (isset($_POST['g-recaptcha-response']) )
    {
        $verifierCaptcha = isValid($_POST['g-recaptcha-response'],$_SERVER["REMOTE_ADDR"]);
    }

    if($verifierCaptcha)
    {


        $messageConfirmation="Une erreur est survenue, veuillez recommencer s'il vous plait.";

        //*********************************************************************
        //                              ENVOI SMS
        //*********************************************************************


        $numero="+330631023304";
        $message="Prénom Nom : ".$_POST['prenomNom']."\r";
        $message.="Téléphone : ".$_POST['telephone']."\r";
        $message.="Ville : ".$_POST['ville']."\r";
        $message.="Email : ".$_POST['email']."\r";
        $message.="Message : ".$_POST['message']."\r";

        $data = array(
            'api_key' => '2e9bb7342817751f671ea908e43266fd',
            'numbers' => $numero,
            'text' => $message
        );

        $ch = curl_init('https://app.raspisms.fr/api/scheduled/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);


        //*********************************************************************
        //                              ENVOI EMAIL
        //*********************************************************************
        $ch = curl_init();
        $message="Prénom Nom  : ".$_POST['prenomNom']."<br>";
        $message.="Téléphone : ".$_POST['telephone']."<br>";
        $message.="Ville : ".$_POST['ville']."<br>";
        $message.="Email : ".$_POST['email']."<br>";
        $message.="Message : ".$_POST['message']."<br>";

        $params=array(
            "emailExpediteur"       =>"reperret@gmail.com",
            "nomExpediteur"         =>"Selfy.fun",
            "emailDestinataire"     =>"reperret@hotmail.com",
            "numeroTemplate"        =>"2",
            "tag_titre"             =>"Nouveau message",
            "tag_contenu"           =>$message,
            "tag_lienbouton"        =>"mailto:".$_POST['email'],
            "tag_libellebouton"     =>"Répondre",
            "sujet"                 =>"demande selfy.fun"
            );

        try 
        {
            curl_setopt($ch, CURLOPT_URL, "https://remyperret.org/api/sendmail/");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);   
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);         
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

            $response = curl_exec($ch);

            if (curl_errno($ch)) 
            {
                echo curl_error($ch);
                die();
            }

            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($http_code == intval(200))
            {
                $messageConfirmation="Message reçu. Nous vous répondons dans les plus bref délais.";
            }
            else
            {
                echo "Ressource introuvable : " . $http_code;
            }
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        } 
        finally 
        {
            curl_close($ch);
        }

        $messageConfirmation="Message reçu. Nous vous répondons dans les plus bref délais.";
    }
    else
    {
        $messageConfirmation="Veuillez valider le reCaptcha en cochant la case 'Je ne suis pas un robot'";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Selfy.fun - location achat born à selfie photobooth">
    <meta name="description" content="Borne à selfie, photobooth de soirée, d'anniversaire, de mariage. Garder un souvenir de vos évènements.">
    <meta name="keywords" content="location photobooth, vente photobooth, photobooth,selfie, selfy, fun, photomaton,cabine photos, photobooth lyon, photobooth valence, valence, lyon, photo lyon, mariage lyon, mariage valence, anniversaire lyon, anniversaire valence, borne à selfie valence, borne à selfie lyon">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="French">
    <title>Selfy.fun - Bornes Photobooth mariages & anniversaires</title>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png" />
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/colors/yellow.css">
    <link rel="preload" href="assets/css/fonts/thicccboi.css" as="style" onload="this.rel='stylesheet'">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        .confirmationContact {
            color: firebrick;
            font-weight: bold;
            font-size: 2em;
        }

    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- header -->
        <?php include 'header.php';?>
        <!-- /header -->

        <section class="wrapper bg-gradient-primary">
            <div class="container pt-10 pt-md-14 pb-8 text-center">
                <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                    <div class="col-lg-7">
                        <figure><img class="w-auto" src="assets/img/illustrations/i2.png" srcset="assets/img/illustrations/i2%402x.png 2x" alt=""></figure>
                    </div>
                    <!-- /column -->
                    <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start">
                        <h1 class="display-1 mb-5 mx-md-n5 mx-lg-0">Borne à selfie</h1>
                        <p class="lead fs-lg mb-7">Autonome et belle, notre borne laissera à tous vos invités des souvenirs fun.</p>
                        <p class="lead fs-lg mb-7">Location à <strong>249€</strong></p>
                        <span><a class="btn btn-primary rounded-pill me-2" href="index.php#contactForm">Réserver</a></span>
                        <span><a class="btn btn-blue rounded-pill me-2" href="tarifs.php">Tarifs</a></span>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->


        <section class="wrapper bg-light">
            <div class="container py-14 py-md-16">
                <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                    <div class="col-lg-6 position-relative order-lg-2">
                        <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem"></div>
                        <div class="overlap-grid overlap-grid-2">
                            <div class="item">
                                <figure class="rounded shadow"><img src="./assets/img/concept/about2.jpg" srcset="./assets/img/concept/about2@2x.jpg 2x" alt=""></figure>
                            </div>
                            <div class="item">
                                <figure class="rounded shadow"><img src="./assets/img/concept/about3.jpg" srcset="./assets/img/concept/about3@2x.jpg 2x" alt=""></figure>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                    <div class="col-lg-6">

                        <h2 class="display-4 mb-3">Le concept</h2>
                        <p class="lead fs-lg">La borne Selfy.fun prend une série de <strong>3 photos</strong> en l'espace de quelques secondes, puis génère un chouette montage. Ce dernier est mis en ligne automatiquement et est instananément disponible via un lien web dédié à l'évènement. Il ne reste plus qu'à lancer l'impression du montage si désiré. Et ainsi de suite jusqu'au bout de la nuit...</p>
                        <div class="row gy-3 gx-xl-8">
                            <div class="col-xl-6">
                                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                    <li><span><i class="uil uil-check"></i></span><span>Impression d'un montage photo 10x15</span></li>
                                    <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Galerie web alimentée en direct</span></li>
                                </ul>
                            </div>
                            <!--/column -->
                            <div class="col-xl-6">
                                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                    <li><span><i class="uil uil-check"></i></span><span>Une animation fun et pas chronophage, la borne est autonome !</span></li>
                                    <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Des souvenirs pour vous et vos invités pendant et après l'évènement</span></li>
                                </ul>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->






        <section class="wrapper bg-light" id="contactForm">
            <div class="container py-14 py-md-16">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <div class="row gy-10 gx-lg-8 gx-xl-12">
                            <div class="col-lg-8">

                                <h2 class="display-4 mb-3">Un mariage, un anniversaire, un séminaire ? Parlez nous de votre projet...</h2>

                                <span class="confirmationContact"> <?php echo "<br><br>".$messageConfirmation;?></span>

                                <form class="contact-form" method="POST" action="index.php#contactForm" novalidate="">

                                    <div class="messages"></div>
                                    <div class="row gx-4">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input id="form_name" type="text" name="prenomNom" class="form-control" placeholder="Prénom Nom" required>
                                                <label for="form_name">Prénom nom *</label>
                                                <div class="valid-feedback">
                                                    Ca a l'air ok !
                                                </div>
                                                <div class="invalid-feedback">
                                                    Votre prénom
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input id="form_lastname" type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
                                                <label for="form_lastname">Téléphone *</label>
                                                <div class="valid-feedback">
                                                    Ca a l'air ok !
                                                </div>
                                                <div class="invalid-feedback">
                                                    Votre nom
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="email" required>
                                                <label for="form_email">Email *</label>
                                                <div class="valid-feedback">
                                                    Ca a l'air ok !
                                                </div>
                                                <div class="invalid-feedback">
                                                    Votre email
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input id="form_lastname" type="text" name="ville" class="form-control" placeholder="Ville" required>
                                                <label for="form_lastname">Ville *</label>
                                                <div class="valid-feedback">
                                                    Ca a l'air ok !
                                                </div>
                                                <div class="invalid-feedback">
                                                    Votre ville
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="col-12">
                                            <div class="form-floating mb-4">
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Votre besoin, à quelle date, tout ce qui sera utile pour vous répondre..." style="height: 150px" required></textarea>
                                                <label for="form_message">Votre besoin, à quelle date... bref tout ce qui sera utile pour vous répondre...*</label>
                                                <div class="valid-feedback">
                                                    Ca a l'air ok !
                                                </div>
                                                <div class="invalid-feedback">
                                                    Une question, un besoin, une envie ? Il faut m'en dire un petit peu plus s'il vous plait...
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /column -->

                                        <!-- /column -->
                                        <div class="col-12">

                                            <input type="hidden" name="contact" value="1">
                                            <div class="g-recaptcha" data-sitekey="6LfuNqMeAAAAAOtTGN10mNhPAEnT-9_b3U5-Bv9G"></div>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Envoyer">
                                            <p class="text-muted"><strong>*</strong> Champs obligatoires</p>
                                        </div>
                                        <!-- /column -->
                                    </div>
                                    <!-- /.row -->
                                </form>
                                <!-- /form -->
                            </div>
                            <!--/column -->
                            <div class="col-lg-4">
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Adresse</h5>
                                        <address>LYON - VALENCE</address>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Téléphone</h5>
                                        <p>07 56 81 74 28</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Email</h5>
                                        <p class="mb-0"><a href="mailto:contact@selfy.fun" class="text-body">contact@selfy.fun</a></p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->



    </div>
    <!-- /.content-wrapper -->
    <footer>
        <div class="container pb-7">

            <!--/.row -->
            <hr class="mt-13 mt-md-14 mb-7" />
            <div class="d-md-flex align-items-center justify-content-between">
                <p class="mb-2 mb-lg-0">selfy.fun - créateur de photobooth</p>

                <!-- /.social -->
            </div>
        </div>
        <!-- /.container -->
    </footer>





    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>

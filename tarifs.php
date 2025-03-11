<?php 
include 'api/bdd.php';
include 'api/fonctions.php';
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
    <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png"/>   
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/colors/yellow.css">
    <link rel="preload" href="assets/css/fonts/thicccboi.css" as="style" onload="this.rel='stylesheet'">
    <style>
        .center{ text-align: center !important; margin: auto;}
    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- header -->
        <?php include 'header.php';?>
        <!-- /header -->
    <section class="wrapper bg-gradient-primary">
      <div class="container pt-10 pb-20 pt-md-14 pb-md-22 text-center">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <h1 class="display-1 mb-3">Tarifs location</h1>
            <p class="lead mb-0 px-xl-10 px-xxl-13">Simples. Basiques.</p><br>
               <p class="lead mb-0 px-xl-10 px-xxl-13">Vous souhaitez <strong>acheter</strong> votre borne ou la commander sur mesure ?<br> <a href="index.php#contactForm">Contactez nous</a></p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
        
        
    <section class="wrapper">
      <div class="container pb-14 pb-md-16">
        <div class="pricing-wrapper position-relative mt-n18 mt-md-n21 mb-12 mb-md-15">
          <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1" style="top: 2rem; right: -2.4rem;"></div>
          <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1" style="bottom: 0.5rem; left: -2.5rem;"></div>
          
          <div class="row gy-6 mt-3 mt-md-5">
            <div class="col-md-6 col-lg-6">
              <div class="pricing card text-center">
                <div class="card-body">
                  <img src="assets/img/icons/lineal/shopping-basket.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="">
                  <h4 class="card-title">Particuliers</h4>
                  <div class="prices text-dark center">
                    <div class="price price-show"><span class="price-value">249</span><span class="price-currency">€</span></div>
                  </div>
                  <!--/.prices -->
                  <ul class="icon-list bullet-bg bullet-soft-primary mt-8 mb-9 text-start">
                    
                    <li><i class="uil uil-check"></i><span><strong>1</strong> Photobooth </span></li>
                      <li><i class="uil uil-check"></i><span><strong>3 jours</strong> inclus </span> (+50€/jour)</li>
                    <li><i class="uil uil-check"></i><span>Shooting numériques <strong>illimités</strong>  </span></li>
                    <li><i class="uil uil-check"></i><span><strong>Galerie </strong> en ligne</span></li>
                    <li><i class="uil uil-check"></i><span><strong>100</strong> impressions incluses*</span></li>
                    <li><i class="uil uil-check"></i><span><strong>Personnalisation</strong> couleurs, logos, motifs...</span></li>
                    <li><i class="uil uil-times bullet-soft-red"></i><span> Livraison et retour (sur devis) </span></li>
                  </ul>
                    
                    * : 30€ pour 100 impressions supplémentaires </br><br>
                  <a href="index.php#contactForm" class="btn btn-primary rounded-pill">Réserver</a>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->
           <!--<div class="col-md-6 col-lg-4 popular">
              <div class="pricing card text-center">
                <div class="card-body">
                  <img src="assets/img/icons/lineal/home.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="">
                  <h4 class="card-title">Le Tranquille</h4>
                 <div class="prices text-dark center">
                    <div class="price price-show"><span class="price-value">200</span><span class="price-currency">€</span></div>
                  </div>
               
                  <ul class="icon-list bullet-bg bullet-soft-primary mt-8 mb-9 text-start">
                    <li><i class="uil uil-check"></i><span><strong>1</strong> Photobooth </span></li>
                    <li><i class="uil uil-check"></i><span>Shooting numériques <strong>illimités</strong>  </span></li>
                    <li><i class="uil uil-check"></i><span><strong>Gallerie </strong> en ligne</span></li>
                    <li><i class="uil uil-check"></i><span><strong>100</strong> impressions inclus</span></li>
                    <li><i class="uil uil-check"></i><span><strong>Personnalisation</strong> couleurs, logos, motifs...</span></li>
                    <li><i class="uil uil-times bullet-soft-red"></i><span> Livraison et retour </span></li>
                    <li><i class="uil uil-times bullet-soft-red"></i><span><strong>100</strong> impressions</span></li>
                  </ul>
                  <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                </div>
               
              </div>
        
            </div> -->
            <!--/column -->
            <div class="col-md-6 col-lg-6">
              <div class="pricing card text-center">
                <div class="card-body">
                  <img src="assets/img/icons/lineal/shopping-basket.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="">
                  <h4 class="card-title">Professionnels</h4>
                  <div class="prices text-dark center">
                    <div class="price price-show"><span class="price-currency">sur</span><span class="price-value">Devis</span></div>
                  </div>
                  <!--/.prices -->
                  <ul class="icon-list bullet-bg bullet-soft-primary mt-8 mb-9 text-start">
                    <li><i class="uil uil-check"></i><span>Animation entreprises, séminaires, congrès, Team Building </span></li>
                    <li><i class="uil uil-check"></i><span><strong>Conception</strong> sur mesure </span></li>
                    <li><i class="uil uil-check"></i><span>Shooting numériques <strong>illimités</strong>  </span></li>
                    <li><i class="uil uil-check"></i><span><strong>Galeries </strong> en ligne</span> multi-évènements</li>
                    <li><i class="uil uil-check"></i><span>Impressions<strong> illimitées</strong></span></li>
                    <li><i class="uil uil-check"></i><span><strong>Assistance</strong> personnalisée...</span></li>
                  </ul>
                  <a href="index.php#contactForm" class="btn btn-primary rounded-pill">Demander un devis</a>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!--/.pricing-wrapper -->
  
          

          
      </div>
      <!-- /.container -->
    </section>


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
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
  <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png" />
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/colors/yellow.css">
  <link rel="preload" href="assets/css/fonts/thicccboi.css" as="style" onload="this.rel='stylesheet'">
  <style>
    .center {
      text-align: center !important;
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="content-wrapper">
    <!-- header -->
    <?php include 'header.php'; ?>
    <!-- /header -->


    <section class="wrapper bg-gradient-primary">
      <div class="container pt-10 pb-15 pt-md-14 pb-md-20 text-center">
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-8 col-xxl-6 mx-auto mb-13" data-cues="slideInDown" data-group="page-title">
            <h1 class="display-1 mb-4">Les photobooth Selfy.fun</h1>
            <p class="lead fs-lg px-xl-12 px-xxl-6 mb-7">Technologies, robustesse, fonctionnalités, design</p>
            <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="page-title-buttons" data-delay="600">
              <span><a class="btn btn-primary rounded mx-1" href="tarifs.php">Louer</a></span>
              <span><a class="btn btn-blue rounded mx-1" href="index.php#contactForm">Acheter</a></span>
            </div>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container pb-14 pb-md-16 mb-lg-22 mb-xl-24">
        <div class="row gx-0 mb-16 mb-mb-20">
          <div class="col-9 col-sm-10 col-lg-9 mx-auto mt-n15 mt-md-n20" data-cues="" data-group="images" data-delay="1500">
            <img class="img-fluid mx-auto rounded shadow-lg" data-cue="slideInUp" src="images/pp1.jpg" alt="">

          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center mb-14 mb-md-18">

          <!--/column -->
          <div class="col-lg-12">
            <h3 class="display-4 mb-5">Un bel objet, simple à installer</h3>
            <p class="mb-5">Chez Selfy.fun, on essaie de concevoir de beaux objets. Notre truc c'est le bois. Imposant, géométrique, notre premier photobooth, affectueusement surnommé Boothy, est fait de sapin et d'amour.</p>

            <p class="mb-5"><strong>L'installation ? </strong> : placez la borne où vous voudrez et branchez la sur une prise classique. C'est tout ce que vous avez à faire. </p>

            <div class="row gy-3">
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-green mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Boothy attire les regards, il impose le respect</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Cela sent bon le <strong>bois</strong></span></li>
                </ul>
              </div>
              <!--/column -->
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-green mb-0">
                  <li><span><i class="uil uil-check"></i></span><span><strong>Décor de fond et accessoires</strong> de décoration possibles</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Le photobooth trouvera toute sa place sur votre évènement</span></li>
                </ul>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->


        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center mb-14 mb-md-18">
          <div class="col-lg-6 position-relative">
            <div class="shape rounded bg-pale-yellow rellax d-block" data-rellax-speed="0" style="top: 50%; left: 50%; width: 50%; height: 60%; transform: translate(-50%,-50%);z-index:0"></div>
            <div class="row gx-md-5 gy-5 position-relative align-items-center">
              <div class="col-6">
                <img class="img-fluid rounded shadow-lg d-flex ms-auto" data-cue="fadeIn" data-delay="300" src="images/sa13.jpg" srcset="images/sa13%402x.jpg 2x" alt="">
              </div>
              <!-- /column -->
              <!-- /column -->
              <div class="col-6">
                <img class="img-fluid rounded shadow-lg mb-5" data-cue="fadeIn" data-delay="900" src="images/sa14.jpg" srcset="images/sa14%402x.jpg 2x" alt="">
                <img class="img-fluid rounded shadow-lg d-flex col-10" data-cue="fadeIn" data-delay="1200" src="images/sa15.jpg" srcset="images/sa15%402x.jpg 2x" alt="">
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <h3 class="display-4 mb-5">Des fonctionnalités</h3>
            <p class="mb-5">Nous avons choisi ce qui fait la réussite d'un photobooth</p>
            <div class="row gy-3">
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-green mb-0">
                  <li><span><i class="uil uil-check"></i></span><span><strong>3 prises</strong> de photos en quelques secondes, pour 3 poses originales</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Mise en ligne <strong>instantannée</strong> (s'il traine un peu de wifi ou 4G là où vous êtes) du montage photo dans une <strong>galerie</strong> accessible en publique ou privée (mot de passe). Le lien est simple à retenir : "XXXX.selfyfun.ovh" où vous choisirez ce que vous voulez mettre à la place de "XXXX".</span></li>
                </ul>
              </div>
              <!--/column -->
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-green mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Impression en <strong>quelques secondes</strong> du cliché selon l'envie.</span></li>
                  <li><span><i class="uil uil-check"></i></span><span><strong>Personnalisation</strong> du logo, motif sur l'écran d'accueil du photobooth et sur le rendu final du montage.</span></li>
                </ul>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->

        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center mb-14 mb-md-18">
          <div class="col-lg-6 position-relative order-lg-2">
            <div class="shape rounded bg-pale-green rellax d-block" data-rellax-speed="0" style="top: 50%; left: 50%; width: 50%; height: 60%; transform: translate(-50%,-50%);z-index:0"></div>
            <div class="row gx-md-5 gy-5 position-relative">
              <div class="col-5">
                <img class="img-fluid rounded shadow-lg my-5 d-flex ms-auto" data-cue="fadeIn" data-delay="300" src="images/sa9.jpg" srcset="images/sa9%402x.jpg 2x" alt="">
                <img class="img-fluid rounded shadow-lg d-flex col-10 ms-auto" data-cue="fadeIn" data-delay="600" src="images/sa10.jpg" srcset="images/sa10%402x.jpg 2x" alt="">
              </div>
              <!-- /column -->
              <div class="col-7">
                <img class="img-fluid rounded shadow-lg mb-5" data-cue="fadeIn" data-delay="900" src="images/sa11.jpg" srcset="images/sa11%402x.jpg 2x" alt="">
                <img class="img-fluid rounded shadow-lg d-flex col-11" data-cue="fadeIn" data-delay="1200" src="images/sa12.jpg" srcset="images/sa12%402x.jpg 2x" alt="">
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <h3 class="display-4 mb-5">La technologie</h3>
            <p class="mb-5">Des composants simples, efficaces. </p>
            <div class="row gy-3">
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-green mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Petite mais douée, la caméra 12Mpx</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Le coeur du réacteur : un Raspberry Pi qui vous garantit une fiabilité à toute épreuve</span></li>
                </ul>
              </div>
              <!--/column -->
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-green mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Vous aimez buzzer ? pousser le bouton et c'est parti</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>L'imprimante photo Canon pour repartir avec son souvenir papier</span></li>
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

  </div>
  <!-- /.content-wrapper -->
  <footer>
    <div class="container pb-7">

      <!--/.row -->
      <hr class="mt-13 mt-md-14 mb-7" />
      <div class="d-md-flex align-items-center justify-content-between">
        <p class="mb-2 mb-lg-0">selfyfun.ovh - créateur de photobooth</p>

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
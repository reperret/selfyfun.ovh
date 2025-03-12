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
      <div class="container py-14 py-md-16">
        <h2 class="display-4 mb-3 text-center">Foire aux questions</h2>
        <p class="lead text-center mb-10 px-md-16 px-lg-0">Si malgré tout, vous ne trouvez pas la réponse à vos questions, <a href="index.php#contactForm">contactez nous</a> !</p>
        <div class="row">
          <div class="col-lg-6 mb-0">
            <div id="accordion-1" class="accordion-wrapper">
              <div class="card accordion-item">
                <div class="card-header" id="accordion-heading-1-1">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-1" aria-expanded="false" aria-controls="accordion-collapse-1-1">Comment se passe la livraion ou la récupération ?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-1-1" class="collapse" aria-labelledby="accordion-heading-1-1" data-bs-target="#accordion-1">
                  <div class="card-body">
                    <p>Nous définissons le lieu et l'horaire pour vous apporter ou vous mettre à disposition la borne : rendez vous à Mermoz Lyon 8 ème dans le cas de la formule "Débrouillard" de base. On vous remet la borne, le manuel, on vous fait une petite démonstration, et c'est parti ! </p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item">
                <div class="card-header" id="accordion-heading-1-2">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-2" aria-expanded="false" aria-controls="accordion-collapse-1-2">Il y a des frais cachés ?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-1-2" class="collapse" aria-labelledby="accordion-heading-1-2" data-bs-target="#accordion-1">
                  <div class="card-body">
                    <p>Non, les seules choses que vous pourrez payer sont : la livraison/retour (sur devis, pas de surprise), le forfait classique (199€ pour les particuliers), les recharges éventuelles si vous voulez imprimer plus de 100 photos (0.5€/impression supplémentaire). Enfin, vous par malheur vous détruisez totalement Boothy, une pénalité de 500€ sera appliquée.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.accordion-wrapper -->
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <div id="accordion-2" class="accordion-wrapper">
              <div class="card accordion-item">
                <div class="card-header" id="accordion-heading-2-1">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-1" aria-expanded="false" aria-controls="accordion-collapse-2-1">Est ce que j'ai obligatoirement besoin d'une connexion Wifi ?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-2-1" class="collapse" aria-labelledby="accordion-heading-2-1" data-bs-target="#accordion-2">
                  <div class="card-body">
                    <p>C'est mieux, ça permettra de mettre en ligne directement vos photos pendant l'évènement. Si vous n'avez pas de wifi, vous avez peut être un téléphone mobile à mettre en partage de connexion? Dans tous les cas, vous photos ne sont pas perdues. Nos bornes ne lâchent jamais rien : elles gardent en mémoire vos photos et dès qu'elles captent un peu de réseau, elles envoient tout dans le cloud (sécurisé).</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item">
                <div class="card-header" id="accordion-heading-2-2">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2">Et si je ne connais rien à l'informatique ?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-bs-target="#accordion-2">
                  <div class="card-body">
                    <p>Ce n'est absolument pas un problème : tout ce que vous aurez à faire c'est : trouver un endroit chouette où placer la borne, et la brancher sur une prise électrique. A ce moment là le programme se lance tout seul et quelques secondes après, le borne est prête.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>

            </div>
            <!-- /.accordion-wrapper -->
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
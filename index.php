<?php
require_once 'classes/ImageManager.php';
$manager = new ImageManager();

$event_id = 1; // À adapter dynamiquement si besoin
$images = $manager->getImagesByEvent($event_id);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Galerie SelfyFun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Fancybox 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
</head>

<body>
    <header>
        <img src="assets/img/boothy.png" alt="Boothy" class="logo">
    </header>

    <main>
        <div class="gallery">
            <?php foreach ($images as $img):
                $guid = htmlspecialchars($img['guid']);
                $imageUrl = "uploads/{$guid}.jpg";
                $thumbUrl = "uploads/thumbnails/{$guid}_thumb.jpg";
            ?>
            <div class="image-container">
                <a data-fancybox="gallery" href="<?= $imageUrl ?>">
                    <img src="<?= $thumbUrl ?>" class="thumb" alt="Photo" />
                </a>
                <div class="action-buttons">
                    <button class="share-btn" data-url="<?= $imageUrl ?>">📤</button>
                    <a class="download-btn" href="<?= $imageUrl ?>" download>⬇️</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Fancybox + Share -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script>
    Fancybox.bind("[data-fancybox='gallery']", {
        Thumbs: false,
        Carousel: {
            infinite: true,
        },
        Toolbar: {
            display: [{
                    id: "counter",
                    position: "center"
                },
                "zoom",
                "download",
                {
                    id: "share",
                    html: "📤",
                    click: (fancybox) => {
                        const url = window.location.origin + '/' + fancybox.getSlide().src;
                        if (navigator.share) {
                            navigator.share({
                                title: "Photo SelfyFun 📸",
                                text: "Regarde cette photo !",
                                url: url
                            });
                        } else {
                            alert("Partage non supporté sur cet appareil.");
                        }
                    }
                },
                "close"
            ]
        }
    });

    // Bouton de partage sous chaque vignette
    document.querySelectorAll('.share-btn').forEach(button => {
        button.addEventListener('click', async () => {
            const url = window.location.origin + '/' + button.dataset.url;
            if (navigator.share) {
                try {
                    await navigator.share({
                        title: "Photo SelfyFun 📸",
                        text: "Regarde cette photo !",
                        url: url
                    });
                } catch (err) {
                    console.warn("Partage annulé", err);
                }
            } else {
                alert("Partage non supporté sur cet appareil.");
            }
        });
    });
    </script>

</body>

</html>
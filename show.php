<?php
$montage = $_GET['m'];
$domaine = explode('.', $_SERVER['HTTP_HOST']);
$domaine = $domaine[0];
$url = "https://" . $domaine . ".selfyfun.ovh";

?>
<!DOCTYPE html>
<html>

<head>
    <title>PARTAGE MONTAGE SELFYFUN.OVH</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        /* CSS */



        .button-32 {
            margin: auto;
            background-color: #2b2b2b;
            border-radius: 20px;
            color: #000;
            cursor: pointer;
            font-weight: bold;
            padding: 10px 15px;
            text-align: center;
            transition: 200ms;

            box-sizing: border-box;
            border: 0;
            font-size: 15px;
            line-height: 10px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-32:not(:disabled):hover,
        .button-32:not(:disabled):focus {
            outline: 0;
            background: #000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, .2), 0 3px 8px 0 rgba(0, 0, 0, .15);
        }

        .button-32:disabled {
            filter: saturate(0.2) opacity(0.5);
            cursor: not-allowed;
        }



        html,
        body {
            height: 90%;
            margin: auto;
            padding: 0;
            text-align: center;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #2b2b2b;
            color: white;
            text-align: center;
        }








        /* Portrait */
        @media screen and (orientation:portrait) {


            img {
                max-width: 100%;/
            }
        }

        /* Landscape */
        @media screen and (orientation:landscape) {
            img {
                max-height: 100%;/
            }
        }
    </style>
</head>

<body>


    <img src="https://www.selfyfun.ovh/photos/<?php echo $montage; ?>"><br>
    <center> <button id="btn" class="button-32" role="button"> <svg t="1580465783605" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="9773" width="30" height="30">
                <path d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z" p-id="9774" fill="#FFF"></path>
            </svg></button></center>

    <div class="footer">

        <p><a href="https//www.selfyfun.ovh"><img src="assets/img/logo-light.png"></a></p>
    </div>



    <script>
        // function for web share api
        function webShareAPI(header, description, link, myFile) {
            navigator
                .share({
                    title: header,
                    text: description,
                    url: link,
                    files: [myFile]
                })
                .then(() => console.log("Successful share"))
                .catch((error) => console.log("Error sharing", error));
        }


        const btn = document.getElementById("btn");



        fetch('./photos/<?php echo $montage; ?>')
            .then(res => res.blob()) // Gets the response and returns it as a blob
            .then(blob => {


                const myFile = new File([blob], "<?php echo $montage; ?>", {
                    type: blob.type,
                });

                if (navigator.share) {
                    // Show button if it supports webShareAPI
                    btn.style.display = "block";
                    btn.addEventListener("click", () =>
                        webShareAPI("Un truc à partager...", "Un petit souvenir de ma soirée avec Selfy.fun", "<?php echo $url; ?>", myFile)
                    );
                } else {
                    // Hide button if it supports webShareAPI
                    btn.style.display = "none";
                    console.error("Your Browser doesn't support Web Share API");
                    document.write("Your Browser doesn't support Web Share API");
                }


            });
    </script>
</body>

</html>
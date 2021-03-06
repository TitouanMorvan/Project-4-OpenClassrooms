
<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="public/img/icon.png">
        <title>Billet simple pour l'Alaska</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Google Font -->

        <link href="https://fonts.googleapis.com/css?family=Kodchasan:300|Spicy+Rice" rel="stylesheet">

        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Icones Fontawesome -->

        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
            integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
            crossorigin="anonymous">

        <!-- Style CSS -->

        <link href="public/css/style.css" rel="stylesheet" />
        <link href="public/css/header.css" rel="stylesheet" />

        <body>

          <?php
            include "public/topbar.php";
           ?>

            <div class="container">

                  <?= $container ?>

            </div>

            <!-- Jquery -->

            <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
            </script>

            <script type="text/javascript" src="public/js/post.func.js">
            </script>
            <script type="text/javascript" id="validation" src="../public/js/signale.js"></script>


        </body>
</html>

<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="public/img/icone.png">
        <title>Billet simple pour l'Alaska | <?= $title ?></title>

        <script src="https://cdn.tiny.cloud/1/ovmgmfg9zivr2ht1nx5mqke0q7nnlgareqj4btk6y94svtqw/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
        <script>
          tinymce.init({
            selector: '#mytextarea'
          });
        </script>

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
            include "public/topbarAdmin.php";
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



        </body>
</html>

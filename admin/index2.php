<?php

  include '../model/main-functions.php';


  $views = scandir('views/');
  if(isset($_GET['page']) && !empty($_GET['page'])){
      if(in_array($_GET['page'].'.php',$views)){
        $page = $_GET['page'];
      }else{
        $page = "error";
      }
  }else{
    $page = "dashboard";
  }

  $views_functions = scandir('model/');
  if(in_array($page.'.func.php',$views_functions)){
    include 'model/'.$page.'.func.php';
  }


 ?>

<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Billet simple pour l'Alaska | ADMINISTRATION <?= $title ?></title>

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

        <link href="../public/css/style.css" rel="stylesheet" />

        <body>

          <?php

          if($page != 'login' && !isset($_SESSION['admin'])){
            header("Location:index.php?page=login");
          }

            include "public/topbar.php";
           ?>

            <div class="container">

              <?php

                  include 'views/'.$page.'.php';

               ?>


            </div>

            <!-- Jquery -->

            <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
            </script>

            <script type="text/javascript" src="js/dashboard.func.js">

            </script>



        </body>
</html>

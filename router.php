<?php

  namespace controllers;

  session_start();

  class route{
    public function __construct(){
      try{

          if(isset($_GET["action"])){

            $action = $_GET["action"];

            switch ($action) {
              case "accueil":
                require_once('controllers/homeController.php');
                $controllers = new HomeController;
                $controllers->accueil();
                break;

              case "article":
                require_once('controllers/homeController.php');
                $controllers = new HomeController;
                if (isset($_GET['id'])) {
                  $controllers->chapitre($_GET['id']);
                }
                else {
                  $controllers->article();
                }
                break;

              case "about":
                require_once('controllers/homeController.php');
                $controllers = new HomeController;
                $controllers->about();
                break;

              case "post":
                require_once('controllers/homeController.php');
                $controllers = new HomeController;
                $controllers->post();
                break;

              case "dashboard":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->dashboard();
                break;

              case "login":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->login();
                break;

              case "write":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->write();
                break;

              case "addcomment":
                require_once('controllers/homeController.php');
                $controllers = new HomeController;
                $controllers->addcomment();
                break;

              case "logout":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->logout();
                break;

              case "signale":
                require_once('controllers/homeController.php');
                $controllers = new HomeController;
                $controllers->signale();
                break;

              case "delete":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->delete();
                break;

              case "delete1":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->delete1();
                break;

              case "delete2":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->delete2();
                break;

              case "modif":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->modif();
                break;

              case "see_comment":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->see_comment();
                break;

              case "see_comment1":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->see_comment1();
                break;

              case "post_article":
                require_once('controllers/adminController.php');
                $controllers = new AdminController;
                $controllers->post_article();
                break;
          }

          }else{
            echo "Pas de variable action";
          }

      }
      catch(Exception $e){}
    }
  }

 ?>

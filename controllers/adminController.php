<?php

  namespace controllers;

  require_once('model/dashboard.func.php');
  require_once('model/login.func.php');
  require_once('model/write.func.php');
  require_once('model/blog.func.php');


  class AdminController {

    public function dashboard(){

      if (isset($_SESSION['role'])) {
        if ($_SESSION['role']=='admin') {
          $dashboardFunc = new Dashboard();
          $NbPosts = $dashboardFunc->inTable("posts");
          $NbComment = $dashboardFunc->inTable("comments");
          $NbAdmins = $dashboardFunc->inTable("admins");
          $comments = $dashboardFunc->get_comments();
          $signalements = $dashboardFunc->signalement();
          $posts = $dashboardFunc->get_posts();
          require_once('views/dashboard.php');
        }else {
          header('Location:index.php?action=login');
        }
      }else {
        header('Location:index.php?action=login');
      }

    }

    public function delete(){

      $deleteFunc = new Dashboard();
      $posts = $deleteFunc->delete_com($_GET['id']);

    }

    public function delete1(){

      $delete1Func = new Dashboard();
      $posts = $delete1Func->delete1_com($_GET['id']);

    }

    public function delete2(){

      $delete1Func = new Dashboard();
      $posts = $delete1Func->delete2_com($_GET['id']);

    }

    public function see_comment(){

      $seecommentFunc = new Dashboard();
      $posts = $seecommentFunc->see_comment_validate($_GET['id']);

    }

    public function see_comment1(){

      var_dump("Bonjour");
      $seecomment1Func = new Dashboard();
      $posts = $seecomment1Func->see_comment_validate1($_GET['id']);

    }

    public function post_article(){

      $postarticleFunc = new Dashboard();
      $posts = $postarticleFunc->post_article_validate();

    }

    public function login(){
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role']=='admin') {
          header('Location:index.php?action=dashboard');
        }
    }

      if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loginFunc = new Login();
        $post = $loginFunc->is_admin($email,$password);
        if (empty($post)) {
          $error = 'Email invalide';
        }else {
          $passwordhash = $post[0];
          $passwordhash = $passwordhash['password'];
          if (password_verify($password, $passwordhash)) {
              $_SESSION['role'] = "admin";
              header('Location:index.php?action=dashboard');
          } else {
              $error = 'Le mot de passe est invalide.';
          }
        }

      }
      require_once('views/login.php');

    }

    public function write(){

      $upload = new Write();
      if(isset($_POST['Envoyer'])&& !empty($_POST['Envoyer']))
      {
        $upload->upload($_FILES, $_POST['titre'], $_POST['commentaire']);
        header('Location:index.php?action=dashboard');
      }

      if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $writeFunc = new Write();
        $post = $writeFunc->post($title,$content);
      }

      if (isset($_POST['id']) && isset($_POST['image'])) {
        $id = $_POST['id'];
        $id.$extension = $_POST['image'];
        $ImgPost = $writeFunc->post_img($tmp_name, $extension);
      }
      require_once('views/write.php');
    }

    public function logout(){
      session_destroy();
      header('Location:index.php?action=login');
    }

    public function modif(){
      $modif = new Blog();
      $post = $modif->get_one_post($_GET['id']);

      $upload = new Write();
      if(isset($_POST['Modifier'])&& !empty($_POST['Modifier']))
      {
          $upload->modifupload($_POST['titre'], $_POST['commentaire'], $_GET['id']);
      }

      if (!empty($_FILES)) {
        $ImgPost = $upload->modif_image($_FILES, $_GET['id']);
        header('Location:index.php?action=dashboard');
      }else {

      }

    require_once('views/modif.php');

    }

  }

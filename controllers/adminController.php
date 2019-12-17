<?php

  namespace controllers;

  require_once('model/dashboard.func.php');
  require_once('model/login.func.php');
  require_once('model/write.func.php');

  class AdminController {

    public function dashboard(){

      if (isset($_SESSION['role'])) {
        if ($_SESSION['role']=='admin') {
          $dashboardFunc = new Dashboard();
          $NbPosts = $dashboardFunc->inTable("posts");
          $NbComment = $dashboardFunc->inTable("comments");
          $NbAdmins = $dashboardFunc->inTable("admins");
          $comments = $dashboardFunc->get_comments();
          require_once('views/dashboard.php');
        }else {
          header('Location:index.php?action=login');
        }
      }else {
        header('Location:index.php?action=login');
      }
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
      //$writeFunc = new Write();
      //$nTitle = $writeFunc->post("title");
      //$nContent = $writeFunc->post("content");
      //$nWrite = $writeFunc->post("writer");
      //$nPosted = $writeFunc->post("posted");
      //$nImg = $writeFunc->post_img("id");
      //$nImg = $writeFunc->post_img("image");
      require_once('views/write.php');
    }

    public function logout(){
      session_destroy();
      header('Location:index.php?action=login');
    }



  }

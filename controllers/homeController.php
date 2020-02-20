<?php

  namespace controllers;

require_once('model/home.func.php');
require_once('model/blog.func.php');
require_once('model/post.func.php');
require_once('model/addcomment.func.php');


   class HomeController {

     public function accueil(){

       $homeFunc = new Home();
       $posts = $homeFunc->get_posts();
       require_once('views/home.php');

     }

     public function article(){

       $blogFunc = new Home();
       $posts = $blogFunc->get_posts();
       require_once('views/blog.php');

     }

     public function about(){

       $aboutFunc = new Home();
       $posts = $aboutFunc->get_posts();
       require_once('views/about.php');

     }

     public function chapitre($id){

       $postFunc = new Blog();
       $posts = $postFunc->get_one_post($id);
       $commentFunc = new Post();
       $comments = $commentFunc->get_comments($id);
       if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])) {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $comment = $_POST['comment'];
         $post_commentFunc = new Post();
         $post_comment = $post_commentFunc->comment($name,$email,$comment);
       }
       require_once('views/post.php');

     }

     public function addcomment(){
       $id = $_GET['id'];
       $name = $_POST['name'];
       $email = $_POST['email'];
       $comment = $_POST['comment'];
       $addcomment = new addcomment();
       $addcomment-> newcomment($id,$name,$email,$comment);
       header('Location: index.php?action=article&id='.$id);
     }

     public function signale(){

       $signaleFunc = new Home();
       $posts = $signaleFunc->signale_com($_GET['id']);

     }

   }

 ?>

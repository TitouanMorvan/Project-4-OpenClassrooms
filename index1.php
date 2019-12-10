<?php

  include 'model/main-functions.php';


  $views = scandir('views/');
  if(isset($_GET['page']) && !empty($_GET['page'])){
      if(in_array($_GET['page'].'.php',$views)){
        $page = $_GET['page'];
      }else{
        $page = "error";
      }
  }else{
    $page = "home";
  }

  $views_functions = scandir('model/');
  if(in_array($page.'.func.php',$views_functions)){
    include 'model/'.$page.'.func.php';
  }


 

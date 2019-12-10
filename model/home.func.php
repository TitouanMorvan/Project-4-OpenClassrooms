<?php

namespace controllers;

class Home{

  public function get_posts(){

    include 'model/main-functions.php';

      //global $db;

      $req = $db->query("

      SELECT * FROM posts

      ");

      $results = array();

      while($rows = $req->fetch()){
        $results[] = $rows;
      }

      return $results;


  }
 }

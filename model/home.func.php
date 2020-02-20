<?php

namespace controllers;

class Home{

  public function get_posts(){

    include 'model/main-functions.php';

      $req = $db->query("

      SELECT * FROM posts

      ");

      $results = array();

      while($rows = $req->fetch()){
        $results[] = $rows;
      }

      return $results;

  }

  public function signale_com($id){

    include 'model/main-functions.php';

    $c = array(
        'id_com'      => $id

    );

    $sql = "INSERT INTO signalement(id_com) VALUES(:id_com)";
    $req = $db->prepare($sql);
    $req->execute($c);
  }
 }

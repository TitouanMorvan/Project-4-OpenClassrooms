<?php

namespace controllers;

class Blog {

  public function get_posts(){

  include 'model/main-functions.php';

    $req = $db->query("SELECT * FROM posts WHERE posted='1' ORDER BY date DESC");

    $results = [];
    while($rows = $req->fetch()){
      $results[] = $rows;
    }

    return $results;

  }

  public function get_one_post($id){

    include 'model/main-functions.php';

    $req = $db->query("

          SELECT * FROM posts WHERE id = '".$id."'

    ");

    $result = $req->fetch();
    return $result;
  }
 }

<?php

namespace controllers;

class Post {

public function get_one_post($id){

  include 'model/main-functions.php';

  $req = $db->query("

        SELECT * FROM posts WHERE id = '".$id."'

  ");

  $result = $req->fetch();
  return $result;
}



function get_post(){
  global $db;

  $req = $db->query("

        SELECT * FROM posts

  ");

  $result = $req->fetchObject();
  return $result;
}


public function comment($name,$email,$comment){

    //global $db;
    include 'model/main-functions.php';

    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]

    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);

}

public function get_comments($id){

  include 'model/main-functions.php';
  //global $db;
  $req = $db->query("SELECT * FROM comments WHERE post_id =  '".$id."' ORDER BY date DESC");
  $results = [];
  while($rows = $req->fetch()){
    $results[] = $rows;
  }

  return $results;
}
 }

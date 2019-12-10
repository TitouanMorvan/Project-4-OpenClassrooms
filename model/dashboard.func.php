<?php

namespace controllers;

class Dashboard{

public function inTable($table){

  include 'model/main-functions.php';

  $query = $db->query("SELECT COUNT(id) FROM $table");
  return $query->fetch();
}

public function getColor($table,$colors){
  if(isset($colors[$table])){
      return $colors[$table];
  }else{
      return "orange";
  }
}

public function get_comments(){
    //global $db;
include 'model/main-functions.php';

    $req = $db->query("
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.seen = '0'
        ORDER BY comments.date ASC
    ");

  $result = [];
  while($rows = $req->fetch()){
    $result[] = $rows;
  }
  return $result;
 }
}

<?php

namespace controllers;

class Admin{

public function inTable($table){
  //global $db;
  include '../model/main-functions.php';
  $query = $db->query("SELECT COUNT(id) FROM $table");
  return $nombre = $query->fetch();
}

function getColor($table,$colors){
  if(isset($colors[$table])){
      return $colors[$table];
  }else{
      return "orange";
  }
}

function get_comments(){
    global $db;

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

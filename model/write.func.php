<?php

namespace controllers;

class Write{

public function post($title,$content,$posted){
    //global $db;
    include 'model/main-functions.php';

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admin'],
        'posted'    =>  $posted

    ];

    $sql = "
      INSERT INTO posts(title,content,writer,date,posted)
      VALUES(:title,:content,:writer,NOW(),:posted)
    ";

    $req = $db->prepare($sql);
    $req->execute($p);
    $id = $db->lastInsertId();
    header("Location:index.php?page=post&id=");
}

public function post_img($tmp_name, $extension){
  global $db;
  $id = $db->lastInsertId();
  $i = [
    'id'    =>  $id,
    'image' =>  $id.$extension  //$id = 25 , $extension = .jpg         $id.extension = "25"."jpg" = 25.jpg
  ];

  $sql = "UPDATE posts SET image = :image WHERE id = :id";
  $req = $db->prepare($sql);
  $req->execute($i);
  move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);
  header("Location:index.php?action=post&id=".$id);
}

}

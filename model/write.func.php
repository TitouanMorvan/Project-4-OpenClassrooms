<?php

namespace controllers;

class Write{

public function post($title,$content,$posted){

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

public function upload(array $infoFiles, $title , $content)
    {
      include 'model/main-functions.php';
      $infoFiles=current($infoFiles);

        if($infoFiles['size']<1500000)
        {
            move_uploaded_file($infoFiles['tmp_name'],'public/img/'.date("G-i-s").$infoFiles['name']);
            $p = [
                'title'     =>  $title,
                'content'   =>  $content,
                'writer'    =>  "Jean Forteroche",
                'posted'    =>  0,
                'img'       =>  date("G-i-s").$infoFiles['name']

            ];

            $sql = "
              INSERT INTO posts(title,content,writer,date,posted,images)
              VALUES(:title,:content,:writer,NOW(),:posted,:img)
            ";

            $req = $db->prepare($sql);
            $req->execute($p);
            echo'L\'image a bien été enregistré';
        }else{

        }
    }


    public function modif_image(array $infoFiles, $id)
        {
          include 'model/main-functions.php';
          $infoFiles=current($infoFiles);

            if($infoFiles['size']<15000000)
            {
                move_uploaded_file($infoFiles['tmp_name'],'public/img/'.date("G-i-s").$infoFiles['name']);
                $p = [

                    'img'       =>  date("G-i-s").$infoFiles['name'],
                    'id'        =>  $id

                ];

                $sql = "
                  UPDATE posts
                  SET images = :img
                  WHERE id = :id
                ";

                $req = $db->prepare($sql);
                $req->execute($p);
                echo'L\'image a bien été enregistré';
            }else{

            }
        }


    public function modifupload($title , $content, $id)
        {
          include 'model/main-functions.php';

                $p = [
                    'title'     =>  $title,
                    'content'   =>  $content,
                    'id'        =>  $id

                ];

                $sql = "
                  UPDATE posts
                  SET title = :title, content = :content
                  WHERE id = :id
                ";

                $req = $db->prepare($sql);
                $req->execute($p);

        }

}

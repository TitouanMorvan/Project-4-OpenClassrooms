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

 public function get_posts(){

   include 'model/main-functions.php';

   $requete = $db->query("SELECT * FROM posts");

   while($row = $requete->fetch()){
     $resultat[] = $row;
     }

     return $resultat;
 }

 public function signalement(){

   include 'model/main-functions.php';

       $req = $db->query("SELECT * FROM signalement");

     $result = [];
     $resultat = [];
     while($rows = $req->fetch()){
       $requete = $db->query("SELECT * FROM comments WHERE id = '". $rows["id_com"]."'");

       while($row = $requete->fetch()){
         $resultat[] = $row;
       }

     }

     return $resultat;
 }

 public function delete_com($id){

   include 'model/main-functions.php';

   $c = array(
       'id_com'      => $id


   );

   $sql = "DELETE FROM comments WHERE id = :id_com";
   $req = $db->prepare($sql);
   $req->execute($c);


   $sql = "DELETE FROM signalement WHERE id_com = :id_com";
   $req = $db->prepare($sql);
   $req->execute($c);
 }

 public function delete1_com($id){

   include 'model/main-functions.php';

   $c = array(
       'id_com'      => $id


   );

   $sql = "DELETE FROM comments WHERE id = :id_com";
   $req = $db->prepare($sql);
   $req->execute($c);
 }

 public function delete2_com($id){

   include 'model/main-functions.php';

   $c = array(
       'id'      => $id


   );

   $sql = "DELETE FROM posts WHERE id = :id";
   $req = $db->prepare($sql);
   $req->execute($c);
 }


public function see_comment_validate($id){

  include 'model/main-functions.php';

  $c = array(
      'id_com'      => $id


  );

  $sql = "DELETE FROM signalement WHERE id_com = :id_com";
  $req = $db->prepare($sql);
  $req->execute($c);
}

public function see_comment_validate1($seen){

  var_dump($seen);

  include 'model/main-functions.php';

  $c = array(
      'seen'      => $seen


  );

  $sql = "UPDATE comments
          SET seen = 1
          WHERE id = :seen";
  $req = $db->prepare($sql);
  $req->execute($c);

}

}

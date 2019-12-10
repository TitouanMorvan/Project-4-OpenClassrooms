<?php

namespace controllers;

class addcomment{

  public function newcomment($id,$name,$email,$comment){

    include 'model/main-functions.php';

    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $id,
        'seen'      => 0

    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date,seen) VALUES(:name, :email, :comment, :post_id, NOW(), :seen)";
    $req = $db->prepare($sql);
    $req->execute($c);

  }

}

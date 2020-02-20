<?php

namespace controllers;

class Login{

public function is_admin($email,$password)
{
  include 'model/main-functions.php';

  $a = [
      'email'     =>  $email
  ];
  $sql = "SELECT * FROM admins WHERE email = :email";
  $req = $db->prepare($sql);
  $req->execute($a);

  $results = array();

  while($rows = $req->fetch()){
    $results[] = $rows;
  }

  return $results;

  return $req;
 }
}

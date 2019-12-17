<?php

namespace controllers;

class Login{

public function is_admin($email,$password)
{
  //global $db;
  include 'model/main-functions.php';

  $a = [
      'email'     =>  $email
  ];
  $sql = "SELECT * FROM admins WHERE email = :email";
  $req = $db->prepare($sql);
  $req->execute($a);
  //$exist = $req->rowCount($sql);

  $results = array();

  while($rows = $req->fetch()){
    $results[] = $rows;
  }

  return $results;

  /*if(isset($_POST['submit'])){
              $email = htmlspecialchars(trim($_POST['email']));
              $password = htmlspecialchars(trim($_POST['password']));

              $errors = [];

              if(empty($email) || empty($password)){
                  $errors['empty'] = "Tous les champs n'ont pas été remplis!";
              }else if(is_admin($email,$password)== 0){
                  $errors['exist']  = "Cet administrateur n'existe pas";
              }

              if(!empty($errors)){
                  ?>
                  <div class="card red">
                      <div class="card-content">
                          <?php
                              foreach($errors as $error){
                                  echo $error."<br/>";
                                }
                              ?>
                          </div>
                        </div>

                      <?php
    }else{
      $_SESSION['admin'] = $email;
      header("Location:index.php?action=dashboard");
    }

  }*/



  //header("Location:index.php?action=error");

  return $req;
 }
}

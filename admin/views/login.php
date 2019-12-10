<?php

  if(isset($_SESSION['admin'])){
    header("Location:index.php?page=dashboard");
  }

 ?>



<div class="admin1">
<div class="row">
  <div class="col l4 m6 s12 offset-l4 offset-m3">
    <div class="card-panel">
      <div class="row">
        <div class="col s6 offset-s3">
          <div class="image-admin">
            <img src="../public/img/admin.png" alt="Administrateur"/>
          </div>
        </div>
      </div>
      <div class="titre-dashboard">
        <h4>SE CONNECTER</h4>

        <?php

        if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    $errors = [];

                    if(empty($email) || empty($password)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis!";
                    }else if(is_admin($email,$password) == 0){
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
            header("Location:index.php?page=dashboard");
          }

        }

         ?>


      </div>

        <form method="post">
          <div class="row">
            <div class="input-field col s12">
              <input type="email" id="email" name="email"/>
              <label for="email">ADRESSE EMAIL</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input type="password" id="password" name="password"/>
              <label for="password">MOT DE PASSE</label>
            </div>
          </div>

          <div class="bouton-admin">
          <button type="submit" name="submit">SE CONNECTER</button>
        </div>

        </form>

    </div>
  </div>
</div>
</div>

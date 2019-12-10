<?php ob_start(); ?>

<div class="admin1">
<div class="row">
  <div class="col l4 m6 s12 offset-l4 offset-m3">
    <div class="card-panel">
      <div class="row">
        <div class="col s6 offset-s3">
          <div class="image-admin">
            <img src="public/img/admin.png" alt="Administrateur"/>
          </div>
        </div>
      </div>
      <div class="titre-dashboard">
        <h4>SE CONNECTER</h4>
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

<?php $container = ob_get_clean(); ?>

<?php require_once('views/main.php'); ?>

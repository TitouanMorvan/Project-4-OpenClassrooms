<?php ob_start(); ?>

<h2>TABLEAU DE BORD</h2>
<div class="row">

  <?php

  $tables = [
    "Publications" => "posts",
    "Commentaires" => "comments",
    "Administrateur" => "admins"
  ];

   ?>

          <div class="col l4 m6 s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">COMMENTAIRES</span>
                <?= $NbComment[0] ?>
              </div>
            </div>
          </div>

          <div class="col l4 m6 s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">ADMINS</span>
                <?= $NbAdmins[0] ?>
              </div>
            </div>
          </div>

          <div class="col l4 m6 s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">PUBLICATIONS</span>
                <?= $NbPosts[0] ?>
              </div>
            </div>
          </div>

</div>

<div class="tableau-admin">

  <h4>GESTION DES ARTICLES</h4>

  <table>
    <thead>
      <tr>
        <th>ARTICLES</th>
        <th>AUTEUR</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(!empty($posts)){
      foreach($posts as $post){
        ?>

        <tr id="article_<?= $post["id"] ?>">
          <td><?=  $post["title"] ?></td>
          <td><?= substr($post["writer"],0,100);  ?></td>
          <td>
              <a onclick="deletement2(<?= $post["id"] ?>)" id="<?=  $post["id"] ?>" class="delete_comment2"><i class="fas fa-trash-alt"></i></a>
              <a href="index.php?action=modif&id=<?= $post["id"] ?>" class="modif"><i class="fas fa-cogs"></i></a>
          </td>
        </tr>

        <?php
      }

    }else{
      ?>

      <tr>
        <td></td>
        <td>AUCUN ARTICLES</td>
      </tr>

      <?php
    }

       ?>
    </tbody>
  </table>

  <h4>COMMENTAIRES NON LUS</h4>

  <table>
    <thead>
      <tr>
        <th>ARTICLES</th>
        <th>COMMENTAIRES</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(!empty($comments)){
      foreach($comments as $comment){
        ?>

        <tr id="commentaire_<?= $comment["id"] ?>">
          <td><?=  $comment["title"] ?></td>
          <td><?= substr($comment["comment"],0,100);  ?></td>
          <td>
              <a onclick="see_comment1(<?= $comment["id"] ?>)" id="<?=  $comment["id"] ?>"class="see_comment1"><i class="fa fa-check" aria-hidden="true"></i></a>
              <a onclick="deletement1(<?= $comment["id"] ?>)" id="<?=  $comment["id"] ?>" class="delete_comment1"><i class="fas fa-trash-alt"></i></a>

          </td>
        </tr>

        <?php
      }

    }else{
      ?>

      <tr>
        <td></td>
        <td>AUCUN COMMENTAIRES A VALIDER</td>
      </tr>

      <?php
    }
       ?>
    </tbody>
  </table>

<h4>COMMENTAIRES SIGNALES</h4>

<table>
  <thead>
    <tr>
      <th>COMMENTAIRES</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
<?php
if(!empty($signalements)){
  foreach ($signalements as $signalement) {
    ?>

    <tr id="signalement_<?= $signalement["id"] ?>">
      <td><?= substr($signalement["comment"],0,150);  ?></td>
      <td>
          <a onclick="see_comment(<?= $signalement["id"] ?>)" id="<?=  $signalement["id"] ?>" class="see_comment"><i class="fa fa-check" aria-hidden="true"></i></a>
          <a onclick="deletement(<?= $signalement["id"] ?>)" id="<?=  $signalement["id"] ?>" class="delete_comment"><i class="fas fa-trash-alt"></i></a>

      </td>
    </tr>

    <?php
  }
}
   ?>
</table>
</div>

<script>

  function deletement(id){
    $.ajax({
     url : 'index.php?action=delete&id='+id,
     type : 'GET',
     dataType : 'html',
     success : function(code_html, statut){ // success est toujours en place, bien sûr !
       var idbalise = "#signalement_"+id;
       $(idbalise).css({"display" : "none"});
       alert("Commentaire supprimé");
     },

     error : function(resultat, statut, erreur){
       alert('PAS oK');
     }

  });
  }

  function deletement1(id){
    $.ajax({
     url : 'index.php?action=delete1&id='+id,
     type : 'GET',
     dataType : 'html',
     success : function(code_html, statut){ // success est toujours en place, bien sûr !
       var idbalise = "#commentaire_"+id;
       $(idbalise).css({"display" : "none"});
       alert("Commentaire supprimé");
     },

     error : function(resultat, statut, erreur){
       alert('PAS oK');
     }

  });
  }

  function deletement2(id){
    $.ajax({
     url : 'index.php?action=delete2&id='+id,
     type : 'GET',
     dataType : 'html',
     success : function(code_html, statut){ // success est toujours en place, bien sûr !
       var idbalise = "#article_"+id;
       $(idbalise).css({"display" : "none"});
       alert("Article supprimé");
     },

     error : function(resultat, statut, erreur){
       alert('PAS oK');
     }

  });
  }

  function see_comment(id){
    $.ajax({
     url : 'index.php?action=see_comment&id='+id,
     type : 'GET',
     dataType : 'html',
     success : function(code_html, statut){ // success est toujours en place, bien sûr !
       var idbalise = "#signalement_"+id;
       $(idbalise).css({"display" : "none"});
       alert("Commentaire validé");
     },

     error : function(resultat, statut, erreur){
       alert('PAS oK');
     }

  });
  }

  function see_comment1(id){
    $.ajax({
     url : 'index.php?action=see_comment1&id='+id,
     type : 'GET',
     dataType : 'html',
     success : function(code_html, statut){ // success est toujours en place, bien sûr !
       var idbalise = "#commentaire_"+id;
       $(idbalise).css({"display" : "none"});
       alert("Commentaire vu");
     },

     error : function(resultat, statut, erreur){
       alert('PAS oK');
     }

  });
  }

</script>

<?php $container = ob_get_clean(); ?>

<?php require_once('views/mainAdmin.php'); ?>

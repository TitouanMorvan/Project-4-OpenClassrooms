<?php ob_start(); ?>

    <h2><?= $posts['title'] ?></h2>
    <h6>Publié par <?= $posts['writer'] ?> le <?= date("d/m/Y à H:i", strtotime($posts['date'])) ?></h6>
      <div class="image-post">
    <img src="public/img/<?=$posts['images'] ?>" alt="<?=$posts['title'] ?>"/>
      </div>
    <p><?= nl2br($posts['content']); ?></p>

  <?php

    foreach ($comments as $comment) {

      ?>

        <div class="commentaire">
          <h3><?=$comment["name"]?></h3>
          <p><?=$comment["comment"]?></p>
          <p><?=$comment["date"]?></p>
            <button class="buttonsignale" type="button" id="<?=$comment["id"]?>">SIGNALER</button>
        </div>

        <script>
      var id = "0";
        $(".buttonsignale").click(function(e){
        $(".background-modal").css({"display":"block"});
        id = e.target.id;
        console.log(id);
        });

      function signalement(){
        $.ajax({
        url : 'index.php?action=signale&id='+id,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){ // success est toujours en place, bien sûr !
        $(".background-modal").css({"display":"none"});
        },

        error : function(resultat, statut, erreur){
          alert('PAS oK');
        }

        });
        }

        </script>

      <?php

    };

      ?>

<hr>

  <form method="post" action="index.php?action=addcomment&id=<?=$id?>">
    <div class="formulaire">

    <div class="input">
      <input type="text" name="name" id="name" />
      <label for="name">NOM</label>
    </div>
    <div class="input">
      <input type="email" name="email" id="email" />
      <label for="email">ADRESSE EMAIL</label>
    </div>
    <div class="input">
      <textarea name="comment" id="comment"></textarea>
      <label for="comment">COMMENTAIRE</label>
    </div>

    <div class="bouton">
      <button class="bouton_comment" type="submit" name="submit">
        COMMENTER CE POSTE
    </div>

   </div>
 </form>

<div class="background-modal">
  <div class="modal1">
    <p>Voulez-vous vraiment signaler ce commentaire ?</p>
      <button onclick="signalement()" type="button" name="oui">OUI</button>
      <button type="button" value="Back" onClick="history.back()" name="non">NON</button>
  </div>
</div>

  <?php $container = ob_get_clean(); ?>

  <?php require_once('views/main.php'); ?>

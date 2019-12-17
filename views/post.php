<?php ob_start(); ?>

<?php

//$post = get_one_post($_GET['id']);
//if($post == false){
  //  header("Location:index.php?page=error");
//}else{
  ?>

    <h2><?= $posts['title'] ?></h2>
    <h6>Par <?= $posts['writer'] ?> le <?= date("d/m/Y à H:i", strtotime($posts['date'])) ?></h6>
    <p><?= nl2br($posts['content']); ?></p>

  <?php


    foreach ($comments as $comment) {
      ?>

        <div class="commentaire">
          <h3><?=$comment["name"]?></h3>
          <p><?=$comment["comment"]?></p>
          <p><?=$comment["date"]?></p>
            <!--<span onclick="alert('helo');">SIGNALER</span> -->
            <input type="button" value="SIGNALER" onClick="ConfirmMessage()">
        </div>

        <script type="text/javascript">
            function ConfirmMessage() {
            if (confirm("VOULEZ-VOUS SIGNALER CE COMMENTAIRE ?")) {
              
                "#OUI";
            }
            }
        </script>


      <?php
      //echo $comment['comment'];
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
      <button type="submit" name="submit">
        COMMENTER CE POSTE
      </div>

</div>
  </form>

  <?php $container = ob_get_clean(); ?>

  <?php require_once('views/main.php'); ?>

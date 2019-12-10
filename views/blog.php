<?php ob_start(); ?>

<h2>BLOG</h2>

<?php

//$posts = get_posts();
foreach($posts as $post){
  ?>

      <div class="row1">
        <div class="col s12 m12 l12">
          <h4><?= $post['title'] ?></h4>

          <div class="row">
            <div class="col s12 m6 l8">
              <?= substr(nl2br($post['content']),0,298)?>
            </div>
            <div class="col s12 m6 l4">
              <img src="public/img/posts/post2.jpg" alt="<?=$post['title'] ?>"/>
              <br/><br/>
              <a href="index.php?action=article&id=<?= $post['id'] ?>"><button type="button" class="btn btn-primary">Lire l'article complet</button></a>
            </div>
          </div>
        </div>
      </div>


  <?php
} ?>

<?php $container = ob_get_clean(); ?>

<?php require_once('views/main.php'); ?>

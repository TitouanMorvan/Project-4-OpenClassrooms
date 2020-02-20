<?php ob_start(); ?>

<h2>POSTER UN ARTICLE</h2>

<div class="formulaire_post">

    <form action="" method="post" enctype="multipart/form-data">
      <div class="texte_article">
            <label for="fname">Titre de l'article</label>
            <input type="text" name="titre" value="<?= $post['title'] ?>" />
      </div>
            <label for="fname">Contenu de l'article</label>
            <textarea id="mytextarea" name="commentaire" placeholder="Le contenu ..." rows="4" cols="102"><?= $post['content'] ?></textarea>
          <div class="formulaire_images">
              <img src="public/img/<?= $post['images'] ?>" alt="images:<?= $post['title'] ?>">
              <legend>Uploader une image</legend>
              <input type="file" name="upload" />
            <div class="button">
              <input type="submit" name="Modifier" value="Modifier" />
            </div>
        </div>
      </form>

</div>

<?php $container = ob_get_clean(); ?>

<?php require_once('views/mainAdmin.php'); ?>

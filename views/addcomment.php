<?php ob_start(); ?>

  <p>VOTRE COMMENTAIRE A BIEN ETE AJOUTER</p>

<?php $container = ob_get_clean(); ?>

<?php require_once('views/main.php'); ?>

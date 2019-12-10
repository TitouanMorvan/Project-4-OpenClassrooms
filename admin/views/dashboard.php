<?php ob_start(); ?>

<h2>TABLEAU DE BORD</h2>
<div class="row">

  <?php

  $tables = [
    "Publications" => "posts",
    "Commentaires" => "comments",
    "Administrateur" => "admins"
  ];

  $colors = [
            "posts"     =>  "green",
            "comments"  =>  "red",
            "admins"    =>  "blue"
        ];

   ?>

   <?php

    foreach($tables as $table_name => $table){
      ?>

          <div class="col l4 m6 s12">
            <div class="card">
              <div class="card-content <?=  getColor($table,$colors) ?>">
                <span class="card-title"><?= $table_name ?></span>
                <?php $nbrInTable = inTable($table) ?>
                <h4><?=  $nbrInTable[0] ?></h4>
              </div>
            </div>
          </div>

      <?php
    }


    ?>


</div>

<div class="tableau-admin">
  <h4>COMMENTAIRES NON LUS</h4>
  <?php

  $comments = get_comments();

   ?>

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
          <td><?= substr($comment["comment"],0,100);  ?>...</td>
          <td>
              <a onclick="see_comment(<?= $comment["id"] ?>)" id="<?=  $comment["id"] ?>"class="see_comment"><i class="fa fa-check" aria-hidden="true"></i></a>
              <a href="#" id="<?=  $comment["id"] ?>"class="delete_comment"><i class="fas fa-trash-alt"></i></a>

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
</div>

<pre>
    <?php
    var_dump($_SESSION);
    ?>
</pre>

<?php $container = ob_get_clean(); ?>

<?php require_once('../views/main.php'); ?>

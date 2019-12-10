<?php ob_start(); ?>

<h2>POSTER UN ARTICLE</h2>
<?php
if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $posted = isset($_POST['public']) ? "1" : "0";

        $errors = [];

        if(empty($title) || empty($content)){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }

        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image'] = "Cette image n'est pas valable";
            }
        }

        if(!empty($errors)){
            ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                            foreach($errors as $error){
                                echo $error."<br/>";
                            }
                        ?>
                    </div>
                </div>
            <?php
        }else{
            post($title,$content,$posted);
            if(!empty($_FILES['image']['name'])){
                post_img($_FILES['image']['tmp_name'], $extension);
            }else{
                $id = $db->lastInsertId();
                header("Location:index.php?acton=post&id=".$id);
            }
        }
    }



 ?>

<div class="formulaire_post">
<form method="post" enctype="multipart/form-data">

    <div class="input-field col s12">
      <input type="text" name="title" id="title">
      <label for="title">Titre de l'article</label>
    </div>

    <div class="input-field col s12">
      <textarea name="content" id="content"></textarea>
      <label for="content">Contenu de l'article</label>
    </div>

    <div class="image_article">
      <div class="input-field file-field">
        <div class="btn col s2">
          <span>Image de l'article</span>
          <input type="file" name="image" class="file" />
        </div>
        <input type="text" class="file-path col s10" readonly/>
      </div>
    </div>

    <div class="switch">
      <p>Public</p>
      <div class="switch">
        <label>
          NON
          <input type="checkbox" name="public">
          <span class="lever"></span>
          OUI
        </label>
      </div>

    </div>

    <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Publier</button>
        </div>

</form>

</div>

<?php $container = ob_get_clean(); ?>

<?php require_once('views/mainAdmin.php'); ?>

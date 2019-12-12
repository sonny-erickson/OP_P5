<?php $title = 'Inscription'; ?>
<?php ob_start() ?>
  <div class="jumbotron m-0">
    <h3 class="text-center pt-3 mb-3">Pour créer un compte : </h3>
    <?php
      if(isset($erreur))
      {
        echo '<div class="container alert alert-danger text-center" role="alert">'.$erreur.'</div>';
      }
      if(isset($accept))
      {
        echo '<div class="container alert alert-success text-center" role="alert">'.$accept.'<a href="index.php?page=connection" class="badge badge-danger ml-2"> ICI </a></div>';
      }
      ?>
    <form method="post">
        <div class="row d-flex justify-content-center">
          <div class="form-group pb-1">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre Pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>" required >
          </div>
        </div>
        <div class="row d-flex justify-content-center pb-1">
          <div class="form-group">
            <label for="pass">Mot de passe</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Tapez mot de passe" required>
          </div>
        </div>
        <div class="row d-flex justify-content-center pb-1">
          <div class="form-group">
            <label for="pass2"> Confirmation du mot de passe</label>
            <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Retapez mot de passe" required>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="form-group pb-1">
            <label for="mail">Adresse Mail</label>
            <input type="email" class="form-control" name="mail" id="mail"  placeholder="Entrez votre mail" value="<?php if(isset($mail)) {echo $mail;} ?>" required>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="form-group pb-1">
            <label for="mail2">Confirmation Adresse Mail</label>
            <input type="email" class="form-control" name="mail2" id="mail2"  placeholder="Entrez votre mail" required>
          </div>
        </div>
        <div class="row d-flex justify-content-center pb-1">
          <button type="submit" name="formulInscription" class="btn btn-success btn-md
          shadow rounded">Envoyer</button>
        </div>
      </form>
  </div>
<?php $content = ob_get_clean() ?>
<?php require 'view/template.php' ?>
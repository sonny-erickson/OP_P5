
<?php  $title = "Connectez-vous"; ?>
<?php ob_start(); ?>
  <div class="jumbotron m-0">
    <h4 class="text-center pb-3 pt-5 ">CONNECTION</h4>
    <?php 
      if(isset($message))
    {
      echo '<div class="container alert alert-danger text-center" role="alert">'.$message.'</div>';
    }
    if(isset($accept))
    {
      echo '<div class="container alert alert-success text-center" role="alert">'.$accept.'</div>';
    }    ?>
    <form class="text-center" method="post" action="index.php?page=connectionSend">
      <div class="row d-flex justify-content-center">
        <div class="form-group pb-2">
          <label for="exampleInputEmail1">Adresse Mail</label>
          <input type="email" name="mailConnect" class="form-control" id="exampleInputEmail1" placeholder="Entrez votre identifiant" value="123@hotmail.fr">
        </div>
      </div>
      <div class="row d-flex justify-content-center pb-3">
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="passConnect" class="form-control" id="exampleInputPassword1" placeholder="Entrez le mot de passe" value="1234" >
        </div>
      </div>
      <div class="row d-flex justify-content-center pb-3">
        <button type="submit" name="formulConnect" class="btn btn-success btn-md
          shadow rounded">Envoyer</button>
      </div>
    </form>
    <div class="text-center">
      <p>
          Toujours pas de compte ? <a class="text-success" href="index.php?page=inscription">Inscrivez-vous ici !</a>
      </p>
    </div>
  </div>
  <?php $content = ob_get_clean(); ?>
  <?php require('view/template.php'); ?>
       
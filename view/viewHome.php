<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
  <div id='homePicture' style='height:300px'>  
  </div>
  <div class="container-fluid" id='home'>
    
      <h1 class="text-center text-light my-4 border-bottom"> Bienvenue sur votre site de jeux vidéos</h1>
      <p>Recherchez une multitude d'informations sur plus de 350000 jeux sur plus de 50 consoles différentes incluant les jeux mobiles mais aussi les jeux PC.</p>
      <p>Après vous êtes inscrit : <a class='btn btn-success btn-lg mx-3' href="index.php?page=inscription">Inscription</a>et/ou connecté:  <a class='btn btn-warning btn-lg mx-3' href="index.php?page=connection">Connection</a></p>
      <p>Après avoir selectionné un jeu,vous pouvez l'ajouter dans votre liste personnalisée</p>
      <p>Comme dans l'exemple suivant: </p>
      <div class="picture01 border border-info pt-3">
      <img class="rounded mb-3" src="assets/01.png" alt="exemple">
      </div>
      <p class='my-3'>Vous pouvez bien évidemment consulter et mofifier votre liste quand vous le souhaitez</p>
      <div class="picture02 border border-info d-flex justify-content-center">
      <img class="text-center mb-3" src="assets/02.png" alt="exemple">
      </div>
  </div>
  
      <script>
       var url = "<?php echo $url;?>";
      </script>
      <?php $content = ob_get_clean(); ?>
    <?php require ("view/template.php"); ?>
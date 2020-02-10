<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
<h1 class="text-center text-light"> TOP 2019</h1>
<p class='text-center text-light'>Voici une liste des meilleurs jeux de l'année 2019</p>
  <div>
      <div class="container-fluid">
        <div class="row" id="top" >
         
        </div>
      </div>       
  </div>   
  <script src="js/ApiNews.js"></script>
    <script>
let best = new News('https://api.rawg.io/api/games?dates=2019-01-01,2019-12-31&ordering=-added','top');</script>
<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>

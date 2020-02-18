<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
    
    <h1 class="text-center text-light"> Les nouveautés 2020</h1>
    <p class="text-light text-center">Voici une liste des jeux les plus attendus pour l'année 2020</p>
    <div>
      <div class="container-fluid">
        <div class="row" id="news"> </div>
      </div>      
    </div> 
    <script src="js/ApiNews.js"></script>
    <script>
    let nouveautes = new News('https://api.rawg.io/api/games?dates=2020-01-01,2020-10-10&ordering=-added','news');
</script>
      <?php $content = ob_get_clean(); ?>
    <?php require ("view/template.php"); ?>
<?php

function listing()
{
	$model = new ModelAdmin();
    $posts = $model -> getGames();
    $platforms = $model -> getPlatforms();

    $links = $model -> getLinks();
	require ('view/admin/viewListing.php');
}

function addGame()
{   
    //1 verif si jeu existe deja ds table games // bool true
    //2 verif si plat exist deja ds table platforms
    //3 si c'est pas le cas  il faut crer jeu et platform dans la bdd (recup info jeu)
    //4 ds tout les cas ajouter le jeu a la liste du membre
    //5 pont: 

    $modelAdmin = new ModelAdmin();
    $game= $modelAdmin->getGame($_GET['game']);
    $platform= $modelAdmin->getPlatform($_GET['platform']);
    $link=$modelAdmin->getLink($_GET['game'],$_GET['platform']);
    $gameCheck=null;
    //var_dump($game);
    if(!$game){
        // jeu inexsistant= ajout bdd
        $gameCheck=json_decode(file_get_contents('https://api.rawg.io/api/games/'.$_GET['game']));
        $title = $gameCheck->name;
        $description = $gameCheck->description;
        $rating = $gameCheck->rating;
        $developers = $gameCheck->name;
        $publishers = $gameCheck->name;
        $genres =$gameCheck->genres[0]->name;
        $slug = $gameCheck->slug;
        $gameId=$modelAdmin->addGame($title, $description, $rating, $developers, $publishers, $genres, $slug);
    }else{
        // récup l'id du jeu
        $gameId=$game['id'];
    }
    if(!$platform){
        // platform inexsistant= ajout bdd
        if($gameCheck===null)
        {$gameCheck=json_decode(file_get_contents('https://api.rawg.io/api/games/'.$_GET['game']));}
        $slugPlatform ="";
        $namePlatform = "";
        //recuperation console name 
        $platformsFetchName = $gameCheck->platforms;
         foreach($platformsFetchName as $platform) {
            //var_dump($platform->platform->slug);
            if($platform->platform->slug == $_GET['platform']) {
                $namePlatform .= $platform->platform->name;
                $slugPlatform .= $platform->platform->slug;
            }
         }
       $platformId=$modelAdmin->addPlatform($slugPlatform, $namePlatform);
    }else{
        //récup l'id de la plat
        $platformId=$platform['id'];
    }
    var_dump($_SESSION['id']);
    var_dump($gameId);
    var_dump($platformId);

    //Ajout à la table liaison
    if(!$link){
        $modelAdmin->addLink($_SESSION['id'], $gameId, $platformId);
        header("Location: index.php?page=listing");  
    }
else{
    echo'jeu deja ds votre liste';
}
  
    //todo: creer la liasion membre jeu plat
    //stocke l'id du member avec 
// echo('<pre>');
// var_export($idMembers->id_member
// );//$platforms[$i]['slug']
// echo('</pre>');die();
}
   
function deleteGame($id)
{
    if(isset($id) AND !empty($id))  
    {
        $modelAdmin = new ModelAdmin();
        $modelAdmin -> deleteGame($id);
        header("Location: index.php?page=listing");
    }  
}




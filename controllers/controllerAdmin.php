<?php
function listing()
{
	$model = new ModelAdmin();
    $links = $model -> getLinks($_SESSION['id']);
	require ('view/admin/viewListing.php');
}

function addGame()
{   
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
        $gameId=$game['game_id'];
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
    // var_dump($_SESSION['id']);
    // var_dump($gameId);
    // var_dump($platformId);

    //Ajout à la table liaison avec exceptions
    try{
        if(!$link){
        $modelAdmin->addLink($_SESSION['id'], $gameId, $platformId);
        header("Location: index.php?page=listing");  
        }
    }catch(Exception $e){
    $alreadyGame = 'Jeu déja existant sur cette console !';
    header("Location: index.php?page=listing"); 
    
}
  
    //todo: creer la liasion membre jeu plat
    //stocke l'id du member avec 
// echo('<pre>');
// var_export($idMembers->id_member
// );//$platforms[$i]['slug']
// echo('</pre>');die();
}
   
function deleteGame($game_id,$id)
{
    if(isset($id) AND !empty($id) AND isset($game_id) AND !empty($game_id))  
    {
        $modelAdmin = new ModelAdmin();
        $modelAdmin -> deleteGame($game_id,$id);
        header("Location: index.php?page=listing");
    }  
}



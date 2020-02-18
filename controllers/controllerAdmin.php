<?php
function listing()
{
    $num=0;
    if(isset($_GET['num']) AND !empty($_GET['num']) AND is_numeric($_GET['num'])){
        $num=$_GET['num'];
    }
	$model = new Model\ModelAdmin();
    $links = $model -> getLinks($_SESSION['id'],$num);
    if(isset($_SESSION['pseudo'])){
        require ('view/admin/viewListing.php');
    }else{
        require ('view/viewError.php');
    }
}
function addGame()
{   
    $modelAdmin = new Model\ModelAdmin();
    $game= $modelAdmin->getGame($_GET['game']);
    $platform= $modelAdmin->getPlatform($_GET['platform']);
    $link=$modelAdmin-> getLinkGamePlat($_GET['game'],$_GET['platform']);
    $gameCheck=null;
    if(!$game){
        // jeu inexsistant= ajout bdd
        $gameCheck=json_decode(file_get_contents('https://api.rawg.io/api/games/'.$_GET['game']));
        $title = $gameCheck->name;
        $description = $gameCheck->description;
        $rating = $gameCheck->rating;
        $genres =$gameCheck->genres[0]->name;
        $slug = $gameCheck->slug;
        $gameId=$modelAdmin->addGame($title, $description, $rating, $genres, $slug);
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
    //Ajout à la table liaison avec exception
    try{
        if(!$link){
        $modelAdmin->addLink($_SESSION['id'], $gameId, $platformId);
        header("Location: index.php?page=listing&num=0");  
        }
    }catch(Exception $e){
        header("Location: index.php?page=listing&num=0"); 
    }
}
   
function deleteGame($game_id,$id)
{
    if(isset($id) AND !empty($id) AND isset($game_id) AND !empty($game_id))  
    {
        $modelAdmin = new Model\ModelAdmin();
        $modelAdmin -> deleteGame($game_id,$id);
        header("Location: index.php?page=listing");
    }  
}



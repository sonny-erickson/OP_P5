<?php
namespace Model;
class ModelAdmin extends Manager
{
    public function getGame($slug)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('SELECT * FROM games WHERE slug_game=?');
        $result=$req->execute(array($slug));
        $result=$req->fetch();
        return $result;
    }
    public function getMember($id_members)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('SELECT * FROM member WHERE member_id=?');
        $result=$req->execute(array($id_members));
        $result=$req->fetch();
        return $result;
    }
    public function getLinks($idUser, $page=0)
    {
        $start=intval($page)*10;//récup valeur d'une var donc 0
        $db=$this->dbConnect();
        $req=$db->prepare('SELECT * FROM liaison l 
            INNER JOIN games g ON l.id_games=g.game_id
            INNER JOIN platforms p ON l.id_platforms=p.id
            WHERE id_members=? limit ?,10');
        $req->bindParam(1,$idUser,\PDO::PARAM_STR);
        $req->bindParam(2,$start,\PDO::PARAM_INT);
        $results = $req -> execute();
        return $req;
     }
    public function getLink($id_games, $id_platforms)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('SELECT * FROM liaison WHERE id_games=? AND id_platforms=?');
        $result=$req->execute(array($id_games, $id_platforms));
        $result=$req->fetch();
        return $result;
    }
    public function getPlatform($slug)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('SELECT * FROM platforms WHERE slug_platform=?');
        $result=$req->execute(array($slug));
        $result=$req->fetch();
        return $result;
    }
public function addGame($title, $description, $rating, $genres, $slug)
    {
        $db=$this->dbConnect();
        $req = $db->prepare('INSERT INTO games (title, description, rating, genres, slug_game, date_add) VALUES (?, ?, ?, ?, ?, NOW())');
        $result=$req->execute(array($title, $description, $rating, $genres, $slug));
        return $db->lastInsertId();
    }
public function addPlatform($slug, $name)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('INSERT INTO platforms (slug_platform, name) VALUES (?, ?)');
        $result=$req->execute(array($slug, $name));
        return $db->lastInsertId();
    }
public function addLink($id_members, $id_games, $id_platforms)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('INSERT INTO liaison (id_members, id_games, id_platforms) VALUES (?, ?, ?)');
        $result=$req->execute(array($id_members, $id_games, $id_platforms));
        return $result;
    }
//si supprime un jeu, seul le jeu d'une seule platform est supprimé
public function deleteGame($game_id,$id)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('DELETE FROM liaison WHERE id_games=? AND id_platforms=?');
        $req->execute(array($game_id,$id));
        return $result;
    }
public function getPlatformsForGameAndMember($slug,$id)
    {
        $db=$this->dbConnect();
        $req=$db->prepare('SELECT p.slug_platform FROM games g 
            INNER JOIN liaison l ON g.game_id = l.id_games 
            INNER JOIN platforms p ON l.id_platforms = p.id WHERE g.slug_game 
            LIKE ? AND l.id_members = ?');
        $req->execute(array($slug,$id));
        $platforms=[];
        while ($platform = $req->fetch()){
        array_push($platforms,$platform['slug_platform']);
        }
        return $platforms;
    }

}


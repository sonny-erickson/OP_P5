<?php

class ModelAdmin extends Manager
{

    public function getGame($slug)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT * FROM games WHERE slug_game=?');
        $result = $req -> execute(array($slug));
        $result = $req -> fetch();
        return $result;
    }
    public function getLinks()
    {
        $db = $this -> dbConnect();
        $req = $db->query(
        '   SELECT * FROM liaison l 
            INNER JOIN members m ON l.id_members = m.member_id
            INNER JOIN games g ON l.id_games=g.game_id
            INNER JOIN platforms p ON l.id_platforms=p.id');
        $result = $req -> fetchAll();
        //var_dump($result);die();
        return $result;
    }
    public function getLink($id_games, $id_platforms)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT * FROM liaison WHERE id_games=? AND id_platforms=?');
        $result = $req -> execute(array($id_games, $id_platforms));
        $result = $req -> fetch();
        return $result;
    }
    public function getPlatform($slug)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT * FROM platforms WHERE slug_platform=?');
        $result = $req -> execute(array($slug));
        $result = $req -> fetch();
        return $result;
    }
public function addGame($title, $description, $rating, $developers, $publishers, $genres, $slug)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO games (title, description, rating, developers, publishers, genres, slug_game, date_add) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $result = $req -> execute(array($title, $description, $rating, $developers, $publishers, $genres, $slug));
        return $db->lastInsertId();
    }
public function addPlatform($slug, $name)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO platforms (slug_platform, name) VALUES (?, ?)');
        $result = $req -> execute(array($slug, $name));
        return $db->lastInsertId();
    }
public function addLink($id_members, $id_games, $id_platforms)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO liaison (id_members, id_games, id_platforms) VALUES (?, ?, ?)');
        $result = $req -> execute(array($id_members, $id_games, $id_platforms));
        return $result;
    }
//si supprime un jeu, seul le jeu d'une seule platform est supprimé
public function deleteGame($game_id,$id)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('DELETE FROM liaison WHERE id_games=? AND id_platforms=?');
        $req->execute(array($game_id,$id));
        return $result;
    }
}


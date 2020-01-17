<?php

class ModelAdmin extends Manager
{
    public function getGames()
        {
            $db = $this -> dbConnect();
            $req = $db->query('SELECT * FROM games ORDER BY date_add');
            $result = $req -> fetchAll();
            return $result;
        }
    public function getPlatforms()
        {
            $db = $this -> dbConnect();
            $req = $db->query('SELECT * FROM platforms');
            $result = $req -> fetchAll();
            return $result;
        }
    public function addGame($title, $description, $rating, $developers, $publishers, $genres, $slug)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO games (title, description, rating, developers, publishers, genres, slug, date_add) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $result = $req -> execute(array($title, $description, $rating, $developers, $publishers, $genres, $slug));
        return $result;
    }
    public function addPlatform($slug, $name)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO platforms (slug, name) VALUES (?, ?)');
        $result = $req -> execute(array($slug, $name));
        return $result;
    }
    public function deleteGame($id)
	{
		$db = $this -> dbConnect();
		$req = $db->prepare('DELETE FROM games WHERE id = ?');
		$req->execute(array($id));
		return $result;
	}
}
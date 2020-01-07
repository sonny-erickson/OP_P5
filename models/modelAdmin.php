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
    public function addGame($id, $titre, $descrition, $rating, $developers, $publishers, $genres, $date_add)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO games (id, titre, descrition, rating, developers, publishers, genres, date_add) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $result = $req -> execute(array($id, $name, $descrition, $rating, $developers, $publishers, $genres));
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
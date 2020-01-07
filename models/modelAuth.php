<?php
// INSCRIPTION PAGE
class ModelAuth extends Manager
{
        // check pseudo and mail un db for inscription
    public function pseudoCheck($pseudo)
    {
        $db = $this -> dbConnect();
        $req = $db ->prepare('SELECT * FROM members WHERE pseudo = ?');
        $req -> execute(array($pseudo));
        $result = $req -> rowcount();
        return $result;
    }
    public function emailCheckInsciption($email)
    {
        $db = $this -> dbConnect();
        $req = $db ->prepare('SELECT * FROM members WHERE email = ?');
        $req -> execute(array($email));
        $result = $req -> rowcount();
        return $result;
    }
    // add user
    public function addUser($pseudo, $pass_hache, $mail)
    {   
        $db = $this -> dbConnect();
        $req = $db->prepare('INSERT INTO members(pseudo, pass, email, inscription_date) VALUES(:pseudo, :pass, :email, CURDATE())');
        $req->execute(array('pseudo' => $pseudo,
                            'pass' => $pass_hache,
                            'email' => $mail));
    }
    // check email in bd
    public function emailCheckConnection($mailConnect)
    {
        $db = $this -> dbConnect();
        $req = $db -> prepare ('SELECT * FROM members WHERE email = :email');
        $req -> execute(array('email' => $mailConnect));
        $result = $req -> fetch();
        return $result;
    }
}

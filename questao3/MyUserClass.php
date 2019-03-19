<?php
require_once 'MyUserSuperClass.php';

// Todo o trabalho de criação do banco foi colocado na Super Classe
class MyUserClass extends MyUserSuperClass
{

    public function getUserList()
    {
        $results = $this->dbconn->query('select name from user');
        sort($results);

        return $results;
    }
}

<?php

namespace Collab;

use \PDO;

class UsersService {

    private PDO $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function save(string $email, string $firstName, string $lastName) {
        $sth = $this->dbh->prepare(
            'INSERT INTO Users (email, firstName, lastName) VALUES (?,?,?)'
        );
        $result = $sth->execute(array($email, $firstName, $lastName));
        if(!$result)  {
            print_r($this->dbh->errorInfo());
            print_r($sth->errorInfo());
        }
    }
}

<?php

namespace Collab;

use \PDO;

class PostsService {

    private PDO $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function save(string $postBody, string $userEmail): string {
        $sth = $this->dbh->prepare('INSERT INTO Posts (body, userEmail) VALUES (?,?);');
        $success = $sth->execute(array($postBody, $userEmail));
        if (!$success) {
            print_r($this->dbh->errorInfo());
            print_r($sth->errorInfo());
            return null;
        } else {
            return $this->dbh->lastInsertId();
        }
    }
}

<?php

namespace Collab\Application;

use \PDO;
use Collab\Application\PostServicePersistenceException;

class PostsService {

    private PDO $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function save(string $postBody, string $userEmail): string {
        try {
            $sth = $this->dbh->prepare('INSERT INTO Posts (body, userEmail) VALUES (?,?);');
            $success = $sth->execute(array($postBody, $userEmail));
            return $this->dbh->lastInsertId();
        } catch (PDOException $exception) {
            throw new PostServicePersistenceException();
        }
    }

    public function all() {
        $sth = $this->dbh->prepare('SELECT body FROM Posts LIMIT 20;');
        $sth->setFetchMode(PDO::FETCH_CLASS, "Collab\Application\PostEntity");
        $sth->execute();
        return $sth;
    }
}

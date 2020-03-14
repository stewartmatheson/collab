<?php

namespace Collab;

use \PDO;
use Collab\PostServicePersistenceException;

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

    public function getAll(): array {
        $sth = $this->dbh->query('SELECT body FROM Posts LIMIT 0, 20;');
        return $sth->fetchAll(PDO::FETCH_CLASS, "Collab\PostEntity");
    }
}

<?php

namespace Collab\Application;

use \PDO;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

class UsersService {

    private PDO $dbh;
    private CognitoIdentityProviderClient  $awsClient;

    function __construct(PDO $dbh, CognitoIdentityProviderClient  $awsClient) {
        $this->dbh = $dbh;
        $this->awsClient = $awsClient;
    }

    public function save(string $email, string $firstName, string $lastName, string $password, string $passwordConfirm) {
        $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid Email Address");
        }

        if ($password !== $passwordConfirm) {
            throw new \Exception("Passwords do not match");
        }

        $this->awsClient->signUp([
            'ClientId' => "2v72javunan3p5drkdknqsr7eq",
            'Username' => $sanitizedEmail,
            'Password' => $password,
            'UserAttributes' => [
                [
                    'Name' => 'name',
                    'Value' => $firstName . " " . $lastName,
                ],
                [
                    'Name' => 'email',
                    'Value' => $sanitizedEmail
                ]
            ],
        ]);

        $sth = $this->dbh->prepare(
            'INSERT INTO Users (email, firstName, lastName) VALUES (?,?,?)'
        );
        $sth->execute(array($sanitizedEmail, $firstName, $lastName));
    }
}

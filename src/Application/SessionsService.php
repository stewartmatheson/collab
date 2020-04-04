<?php

namespace Collab\Application;

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

class SessionsService {
    private CognitoIdentityProviderClient  $awsClient;

    function __construct(CognitoIdentityProviderClient  $awsClient) {
        $this->awsClient = $awsClient;
    }

    public function save(string $email, string $password): string {
        $result = $this->awsClient->adminInitiateAuth([
            'AuthFlow' => 'ADMIN_NO_SRP_AUTH',
            'ClientId' => "2p0nkdl18ismnn55n2dhd36cr5",
            'UserPoolId' => "ap-southeast-2_zzoioqVeH",
            'AuthParameters' => [
                'USERNAME' => $email,
                'PASSWORD' => $password,
            ],
        ]);
        return $result->get('AuthenticationResult')['AccessToken'];
    }
}

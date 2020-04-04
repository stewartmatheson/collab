<?php 

namespace Collab\Core;

use Collab\Core\ISecurity;
use Collab\Core\Request;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException;

class CognitoSecurity implements ISecurity {

    private array $user;
    private CognitoIdentityProviderClient $awsClient;

    function __construct(CognitoIdentityProviderClient  $awsClient) {
        $this->awsClient = $awsClient;
    }

    public function validate(Request $request) : bool {
        if (empty($request->getToken())) {
            return false;
        }

        try {
            $result = $this->awsClient->getUser(
                ['AccessToken' => $request->getToken()]
            );
            $this->user = $result['UserAttributes'];
            return true;
        } catch(CognitoIdentityProviderException $e) {
            return false;
        }
    }

    public function getContext() : SecurityContext {
        $email = $this->user[3]['Value'];
        $displayName = $this->user[2]['Value'];
        return new SecurityContext($email, $displayName);
    }
}


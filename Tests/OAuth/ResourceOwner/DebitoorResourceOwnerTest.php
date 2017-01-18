<?php

namespace HWI\Bundle\OAuthBundle\Tests\OAuth\ResourceOwner;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\DebitoorResourceOwner;

/**
 * Class DebitoorResourceOwnerTest
 */
class DebitoorResourceOwnerTest extends GenericOAuth2ResourceOwnerTest
{
    protected $userResponse = <<<json
{
    "id": "1",
    "name": "bar"
}
json;

    protected $paths = [
        'identifier' => 'id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    ];

    protected function setUpResourceOwner($name, $httpUtils, array $options)
    {
        return new DebitoorResourceOwner($this->buzzClient, $httpUtils, $options, $name, $this->storage);
    }
}

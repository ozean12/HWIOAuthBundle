<?php

namespace HWI\Bundle\OAuthBundle\Tests\OAuth\ResourceOwner;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\FigoResourceOwner;

/**
 * Class FigoResourceOwnerTest.
 */
class FigoResourceOwnerTest extends GenericOAuth2ResourceOwnerTest
{
    protected $userResponse = <<<json
{
    "user_id": "1",
    "name": "bar",
    "email": "baz"
}
json;

    protected $paths = array(
        'identifier' => 'user_id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    );

    protected $expectedUrls = array(
        'authorization_url' => 'http://user.auth/?test=2&response_type=code&client_id=clientid&redirect_uri=http%3A%2F%2Fredirect.to%2F',
        'authorization_url_csrf' => 'http://user.auth/?test=2&response_type=code&client_id=clientid&state=random&redirect_uri=http%3A%2F%2Fredirect.to%2F',
    );

    protected function setUpResourceOwner($name, $httpUtils, array $options)
    {
        return new FigoResourceOwner($this->buzzClient, $httpUtils, $options, $name, $this->storage);
    }
}

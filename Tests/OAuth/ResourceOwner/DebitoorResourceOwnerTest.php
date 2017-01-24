<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\Tests\OAuth\ResourceOwner;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\DebitoorResourceOwner;

class DebitoorResourceOwnerTest extends GenericOAuth2ResourceOwnerTest
{

    protected $paths = [
        'identifier' => 'email',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    ];

    public function testGetUserInformationFailure()
    {
        // No request is made, nothing to fail
    }

    public function testGetUserInformation()
    {
        $this->mockBuzz($this->userResponse, 'application/json; charset=utf-8');
        // Fake call to match expectations
        $this->buzzClient->send(new \Buzz\Message\Request(), new \Buzz\Message\Response());

        /**
         * @var \HWI\Bundle\OAuthBundle\OAuth\Response\AbstractUserResponse
         */
        $userResponse = $this->resourceOwner->getUserInformation(['access_token' => 'token']);

        $this->assertEquals('', $userResponse->getUsername());
        $this->assertEquals('Debitoor User', $userResponse->getNickname());
        $this->assertEquals('token', $userResponse->getAccessToken());
        $this->assertNull($userResponse->getRefreshToken());
        $this->assertNull($userResponse->getExpiresIn());
    }

    public function testCustomResponseClass()
    {
        parent::testCustomResponseClass();
        // Fake call to match expectations
        $this->buzzClient->send(new \Buzz\Message\Request(), new \Buzz\Message\Response());
    }

    protected function setUpResourceOwner($name, $httpUtils, array $options)
    {
        return new DebitoorResourceOwner($this->buzzClient, $httpUtils, $options, $name, $this->storage);
    }
}

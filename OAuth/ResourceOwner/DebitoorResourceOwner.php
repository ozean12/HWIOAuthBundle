<?php

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Buzz\Message\Response as HttpResponse;

/**
 * Class DebitoorResourceOwner.
 *
 * @author Aleksei Vesnin <dizeee@dizeee.ru>
 */
class DebitoorResourceOwner extends GenericOAuth2ResourceOwner
{
    /**
     * {@inheritdoc}
     */
    protected $paths = [
        'identifier' => 'id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    ];

    /**
     * {@inheritdoc}
     */
    protected function doGetUserInformationRequest($url, array $parameters = [])
    {
        $response = new HttpResponse();
        $response->setContent('{}');

        return $response;
    }


    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'authorization_url' => 'https://app.debitoor.com/login/oauth2/authorize',
            'access_token_url' => 'https://app.debitoor.com/login/oauth2/access_token',
            'infos_url' => null,
            'use_bearer_authorization' => false,
            'csrf' => false,
        ]);
    }
}

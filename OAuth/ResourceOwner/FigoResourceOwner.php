<?php

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FigoResourceOwner.
 */
class FigoResourceOwner extends GenericOAuth2ResourceOwner
{
    /**
     * {@inheritdoc}
     */
    protected $paths = array(
        'identifier' => 'user_id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    );

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'authorization_url' => 'https://api.figo.me/auth/code',
            'access_token_url' => 'https://api.figo.me/auth/token',
            'infos_url' => 'https://api.figo.me/rest/user',
            'use_bearer_authorization' => false,
        ));
    }
}

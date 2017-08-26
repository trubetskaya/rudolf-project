<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'service_manager' => [
        'initializers' => [
            ZfcRbac\Initializer\AuthorizationServiceInitializer::class
        ],
        'aliases' => [
            \Zend\Authentication\AuthenticationService::class => 'zfcuser_auth_service'
        ]
    ],

    'view_manager' => [
        'display_exceptions' => false,
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];

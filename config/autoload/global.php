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

use Zend\I18n\Translator;
use Dashboard\I18n\Translator as I18n;

return [
    'service_manager' => [
        'factories' => [
            Translator\LoaderPluginManager::class => Translator\LoaderPluginManagerFactory::class,
            Translator\TranslatorInterface::class => I18n\DatabaseTranslationFactory::class
        ],
        'initializers' => [
            ZfcRbac\Initializer\AuthorizationServiceInitializer::class
        ],
        'aliases' => [
            \Zend\Authentication\AuthenticationService::class => 'zfcuser_auth_service'
        ]
    ],

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],

    'view_helpers' => [
        'invokables' => [
            'translate' => \Zend\I18n\View\Helper\Translate::class
        ],
    ],
];

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
    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => getcwd() .  '/data/language',
                'pattern'  => '%s.mo',
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            \Zend\I18n\Translator\TranslatorInterface::class => \Zend\I18n\Translator\TranslatorServiceFactory::class,
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

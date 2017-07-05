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
        'remote_translation' => [
            [
                'type' => 'database' //This sets the database loader for the default textDomain
            ],
        ],
        'loaderpluginmanager' => [
            'factories' => [
                'database' => Dashboard\I18n\Translator\DatabaseTranslationLoaderFactory::class,
            ]
        ],
    ],

    'service_manager' => [
        'factories' => [
            \Zend\I18n\Translator\LoaderPluginManager::class => \Zend\I18n\Translator\LoaderPluginManagerFactory::class,
            \Zend\I18n\Translator\TranslatorInterface::class => function  (\Zend\ServiceManager\ServiceLocatorInterface $serviceManager)
            {
                $pm = $serviceManager->get(\Zend\I18n\Translator\LoaderPluginManager::class);
                $pm->setFactory('database', \Dashboard\I18n\Translator\DatabaseTranslationLoaderFactory::class);

                $instance = new \Zend\I18n\Translator\Translator;
                $instance->addRemoteTranslations('database');
                $instance->setFallbackLocale('en_US');
                $instance->setPluginManager($pm);

                return $instance;
            },
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

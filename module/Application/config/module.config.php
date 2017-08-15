<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application {

    use Zend\Mvc\Router\Http\Query;
    use Zend\Router\Http;
    use Zend\ServiceManager\Factory\InvokableFactory;
    use Doctrine\ORM\Mapping\Driver;


    return [

        'doctrine' => [

            // Metadata Mapping driver configuration
            'driver' => [

                // Configuration for service `doctrine.driver.orm_default` service
                'app_entity' => [
                    'class' => Driver\AnnotationDriver::class,
                    'paths' => __DIR__ . '/../src/Entity'
                ],

                // Configuration for service `doctrine.driver.orm_default` service
                'orm_default' => [

                    // Map of driver names to be used within this driver chain, indexed by entity namespace
                    'drivers' => [
                        'Application\Entity'  => 'app_entity'
                    ],
                ],
            ],
        ],

        'router' => [
            'routes' => [
                'home' => [
                    'type' => Http\Literal::class,
                    'options' => [
                        'route' => '/',
                        'defaults' => [
                            'controller' => Controller\IndexController::class,
                            'action' => 'index',
                        ],
                    ],
                ],
                'contacts' => [
                    'type' => Http\Literal::class,
                    'options' => [
                        'route' => '/contacts',
                        'defaults' => [
                            'controller' => Controller\IndexController::class,
                            'action' => 'contacts',
                        ],
                    ],
                ],
                'sale' => [
                    'type' => Http\Literal::class,
                    'options' => [
                        'route' => '/sale',
                        'defaults' => [
                            'controller' => Controller\InfoController::class,
                            'action' => 'sale',
                        ],
                    ],
                ],
                'services' => [
                    'type' => Http\Literal::class,
                    'options' => [
                        'route' => '/services',
                        'defaults' => [
                            'controller' => Controller\InfoController::class,
                            'action' => 'services',
                        ],
                    ],
                ],
                'application' => [
                    'type' => Http\Segment::class,
                    'options' => [
                        'route' => '/application[/:action]',
                        'defaults' => [
                            'controller' => Controller\IndexController::class,
                            'action' => 'index',
                        ],
                        'constraints' => [
                            'controller'    => '[a-zA-Z][a-zA-Z0-9_-]+',
                            'action'        => '[a-zA-Z][a-zA-Z0-9_-]+'
                        ],
                    ],
                ],

                'catalog' => [
                    'type' => Http\Segment::class,
                    'options' => [
                        'route' => '/catalog[/:action[/:id]]',
                        'constraints' => [
                            'controller'    => '[a-zA-Z][a-zA-Z0-9_-]+',
                            'action'        => '[a-zA-Z][a-zA-Z0-9_-]+',
                            'id'            => '[0-9]+'
                        ],
                        'defaults' => [
                            'controller'    => Controller\CatalogController::class,
                            'action'        => 'index',
                        ],
                    ],
                    'may_terminate' => true
                ],
            ],
        ],

        'controllers' => [

            'factories' => [
                Controller\IndexController::class => InvokableFactory::class,
                Controller\CatalogController::class => InvokableFactory::class,
                Controller\InfoController::class => InvokableFactory::class,
            ],

            'aliases' => [
                'catalog' => Controller\CatalogController::class
            ]
        ],

        'view_manager' => [
            'display_not_found_reason' => true,
            'display_exceptions' => true,
            'doctype' => 'HTML5',
            'not_found_template' => 'error/404',
            'exception_template' => 'error/index',
            'template_map' => [
                'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
                'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
                'error/404' => __DIR__ . '/../view/error/404.phtml',
                'error/index' => __DIR__ . '/../view/error/index.phtml',
            ],
            'template_path_stack' => [
                __NAMESPACE__ => __DIR__ . '/../view',
            ],
        ],

        'images' => [
            '1461x1050' => [
                'small' => '487x350',
                'quadratic' => '250x250',
            ]
        ]
    ];

}
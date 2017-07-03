<?php
namespace Dashboard {

    use Zend\Router\Http\Literal;
    use Zend\Router\Http\Segment;
    use Doctrine\ORM\Mapping\Driver;
    use Zend\ServiceManager\Factory\InvokableFactory;
    use Dashboard\Form\View\Helper;

    return [

        'doctrine' => [

            // Metadata Mapping driver configuration
            'driver' => [

                // Configuration for service `doctrine.driver.orm_default` service
                'zfcuser_entity' => [
                    'class' => Driver\AnnotationDriver::class,
                    'paths' => __DIR__ . '/../src/Entity'
                ],

                // Configuration for service `doctrine.driver.orm_default` service
                'orm_default' => [

                    // Map of driver names to be used within this driver chain, indexed by entity namespace
                    'drivers' => [
                        'Dashboard\Entity'  => 'zfcuser_entity'
                    ],
                ],
            ],
        ],

        'controllers' => [

            'aliases' => [
                'index' => Controller\IndexController::class,
                'commerce' => Controller\CommerceController::class,
            ],

            'factories' => [
                Controller\IndexController::class => InvokableFactory::class,
                Controller\CommerceController::class => InvokableFactory::class,
            ]
        ],

        'router' => [
            'routes' => [
                'zfcadmin' => [
                    'type' => Literal::class,
                    'options' => [
                        'route'    => '/dashboard',
                        'defaults' => [
                            'module'    => 'dashboard',
                            'controller' => Controller\IndexController::class,
                            'action'     => 'index',
                        ],
                    ],

                    'child_routes' => [
                        'dashboard' => [
                            'type' => Segment::class,
                            'options' => [
                                'route' => '/:controller[/:action[/:id]]',
                                'constraints' => [
                                    'controller'    => '[a-zA-Z][a-zA-Z0-9_-]+',
                                    'action'        => '[a-zA-Z][a-zA-Z0-9_-]+',
                                    'id'            => '[0-9]+'
                                ],
                                'defaults' => [
                                    'controller'    => Controller\IndexController::class,
                                    'action'        => 'index',
                                ],
                            ],
                        ],
                    ]
                ],
            ],
        ],

        'view_manager' => [
            'not_found_template'       => 'error/404',
            'exception_template'       => 'error/index',
            'template_map' => [
                'form-head'         => __DIR__ . '/../view/dashboard/partial/form/header.phtml',
                'form-controls'     => __DIR__ . '/../view/dashboard/partial/form/footer.phtml',
                'partial/upload'    => __DIR__ . '/../view/dashboard/partial/upload.phtml',

                'layout/empty'      => __DIR__ . '/../view/layout/empty.phtml',
                'layout/dashboard'  => __DIR__ . '/../view/layout/dashboard.phtml',

                'error/404'         => __DIR__ . '/../view/error/404.phtml',
                'error/index'       => __DIR__ . '/../view/error/500.phtml',
                'error/403'         => __DIR__ . '/../view/error/403.phtml',

                'dashboard/menu'    => __DIR__ . '/../view/layout/menu.phtml',
            ],

            'template_path_stack' => [
                __NAMESPACE__ => __DIR__ . '/../view',
                'zfcuser' => __DIR__ . '/../view',
            ],
        ],

        'view_helpers' => [

            // Invokables
            'invokables' => [
            ],
        ],

        'navigation' => [
            'admin' => [
                'menu' => [
                    'route' => 'zfcadmin',
                    'label' => '<i class="fa fa-home"></i>Dashboard',
                ],
                'ecommerce' => [
                    'uri' => 'javascript:;',
                    'label' => '<i class="fa fa-bar-chart-o"></i>ECommerce<span class="fa fa-chevron-down"></span>',
                    'pages' => [
                        'list' => [
                            'label' => 'List',
                            'route' => 'zfcadmin/dashboard',
                            'controller' => 'commerce',
                            'action' => 'index',
                        ],

                        'add' => [
                            'label' => 'Add',
                            'route' => 'zfcadmin/dashboard',
                            'controller' => 'commerce',
                            'action' => 'add',
                        ],

                        'edit' => [
                            'label' => 'Edit',
                            'route' => 'zfcadmin/dashboard',
                            'controller' => 'commerce',
                            'action' => 'edit',
                            'visible' => false
                        ]


                    ],
                ],

                'landing' => [
                    'route' => 'home',
                    'label' => '<i class="fa fa-laptop"></i>Landing',
                ],

                'exit' => [
                    'route' => 'zfcuser/logout',
                    'label' => '<i class="fa fa-power-off"></i>Exit',
                ],
            ],
        ],
    ];
}
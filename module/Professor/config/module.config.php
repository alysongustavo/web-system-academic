<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Professor;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'professor-dashboard' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/professor',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'dashboard',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'professor-user' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/user[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\UserController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'professor-notification' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/notification[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\NotificationController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'professor-attachment' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/attachment[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\AttachmentController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'professor-turma' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/turma[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\TurmaController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\UserController::class => InvokableFactory::class,
            Controller\NotificationController::class => InvokableFactory::class,
            Controller\AttachmentController::class => InvokableFactory::class,
            Controller\TurmaController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/professor'           => __DIR__ . '/../view/layout/professor.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];

<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Diretoria;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'diretoria-dashboard' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/diretoria',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'dashboard',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'diretoria-user' => [
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
                    'diretoria-local' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/local[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\LocalController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-module' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/module[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ModuleController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-schedule' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/schedule[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ScheduleController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-subject' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/subject[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\SubjectController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-academicdegree' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/academicdegree[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\AcademicDegreeController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-course' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/course[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\CourseController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-academicperiod' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/academicperiod[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\AcademicPeriodController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'diretoria-notification' => [
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
                    'diretoria-attachment' => [
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
                    'diretoria-turma' => [
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
            Controller\LocalController::class => InvokableFactory::class,
            Controller\ModuleController::class => InvokableFactory::class,
            Controller\ScheduleController::class => InvokableFactory::class,
            Controller\SubjectController::class => InvokableFactory::class,
            Controller\AcademicDegreeController::class => InvokableFactory::class,
            Controller\CourseController::class => InvokableFactory::class,
            Controller\AcademicPeriodController::class => InvokableFactory::class,
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
            'layout/diretoria'           => __DIR__ . '/../view/layout/diretoria.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
];

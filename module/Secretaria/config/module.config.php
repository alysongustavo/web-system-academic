<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Secretaria;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'secretaria-dashboard' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/secretaria',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'dashboard',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'secretaria-user' => [
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
                    'secretaria-local' => [
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
                    'secretaria-module' => [
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
                    'secretaria-schedule' => [
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
                    'secretaria-subject' => [
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
                    'secretaria-academicdegree' => [
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
                    'secretaria-course' => [
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
                    'secretaria-academicperiod' => [
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
                    'secretaria-turma' => [
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
            Controller\TurmaController::class => InvokableFactory::class,
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/secretaria'           => __DIR__ . '/../view/layout/secretaria.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];

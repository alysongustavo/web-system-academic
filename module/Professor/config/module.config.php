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

                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
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

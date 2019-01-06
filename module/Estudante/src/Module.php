<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Estudante;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    // The "init" method is called on application start-up and
    // allows to register an event listener.
    public function init(ModuleManager $manager)
    {
        // Get event manager.
        $eventManager = $manager->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();
        // Register the event listener method.
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch',
            [$this, 'onDispatch'], 100);
    }

    // Event listener method.
    public function onDispatch(MvcEvent $event)
    {
        // Get controller to which the HTTP request was dispatched.
        $controller = $event->getTarget();
        // Get fully qualified class name of the controller.
        $controllerClass = get_class($controller);
        // Get module name of the controller.
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

        // Switch layout only for controllers belonging to our module.
        if ($moduleNamespace == __NAMESPACE__) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate('layout/estudante');
        }
    }
}

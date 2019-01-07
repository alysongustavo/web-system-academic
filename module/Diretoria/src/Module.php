<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Diretoria;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use PHPUnit\Framework\ExpectationFailedException;

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
        $routeMatch = $event->getRouteMatch();

        // Get fully qualified class name of the controller.
        $controllerClass = get_class($controller);
        // Get module name of the controller.
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

        $match = $routeMatch->getParam('controller');

        $action = $routeMatch->getParam('action');

        $controllerClass = $this->getControllerFullClassName($event);
        $match           = substr($controllerClass, strrpos($controllerClass, '\\') + 1);


        $module =  strtolower($moduleNamespace);
        $match           = strtolower($match);
        $actionlower = strtolower($action);

        $funcionalidadeAcessada = $module.'.'.$match.'.'.$actionlower;

        var_dump($funcionalidadeAcessada);

        // Switch layout only for controllers belonging to our module.
        if ($moduleNamespace == __NAMESPACE__) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate('layout/diretoria');
        }
    }


    /**
     * Get the full current controller class name
     *
     * @return string
     */
    protected function getControllerFullClassName(MvcEvent $event)
    {
        $routeMatch           = $event->getRouteMatch();
        if (! $routeMatch) {
            throw new ExpectationFailedException($this->createFailureMessage($event,'No route matched'));
        }
        $controllerIdentifier = $routeMatch->getParam('controller');
        $controllerManager    = $this->getApplicationServiceLocator($event)->get('ControllerManager');
        $controllerClass      = $controllerManager->get($controllerIdentifier);

        return get_class($controllerClass);
    }

    /**
     * Get the service manager of the application object
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getApplicationServiceLocator(MvcEvent $mvcEvent)
    {
        return $mvcEvent->getApplication()->getServiceManager();
    }

    /**
     * Create a failure message.
     *
     * If $traceError is true, appends exception details, if any.
     *
     * @param string $message
     * @return string
     */
    protected function createFailureMessage(MvcEvent $event, $message)
    {
        if (true !== $this->traceError) {
            return $message;
        }

        $exception = $event->getApplication()->getMvcEvent()->getParam('exception');
        if (! $exception instanceof \Throwable && ! $exception instanceof \Exception) {
            return $message;
        }

        $messages = [];
        do {
            $messages[] = sprintf(
                "Exception '%s' with message '%s' in %s:%d",
                get_class($exception),
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine()
            );
        } while ($exception = $exception->getPrevious());

        return sprintf("%s\n\nExceptions raised:\n%s\n", $message, implode("\n\n", $messages));
    }
}

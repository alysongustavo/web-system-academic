<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 04/01/2019
 * Time: 00:35
 */

namespace Secretaria\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function findAction()
    {
        return new ViewModel();
    }

    public function toViewAction()
    {
        return new ViewModel();
    }

}
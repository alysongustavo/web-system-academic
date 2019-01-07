<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 06/01/2019
 * Time: 23:49
 */

namespace Estudante\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AcademicDegreeController extends AbstractActionController
{

    public function toViewAction(){

        return new ViewModel();
    }

}
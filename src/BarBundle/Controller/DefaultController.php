<?php

namespace BarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
*   DefaultController class
*/
class DefaultController extends Controller
{
    /**
    * indexAction method
    * @param $name mixed
    */
    public function indexAction($name)
    {
        return $this->render('BarBundle:Default:index.html.twig', array('name' => $name));
    }
}

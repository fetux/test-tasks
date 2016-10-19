<?php

namespace ChainCommandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
*   DefaultController class
*/
class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
    * indexAction method
    * @param $name mixed
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}

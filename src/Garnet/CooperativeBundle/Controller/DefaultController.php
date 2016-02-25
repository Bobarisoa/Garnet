<?php

namespace Garnet\CooperativeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GarnetCooperativeBundle:Default:index.html.twig', array('name' => $name));
    }
}

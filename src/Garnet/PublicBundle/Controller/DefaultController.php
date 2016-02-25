<?php

namespace Garnet\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GarnetPublicBundle:Default:index.html.twig', array('name' => $name));
    }
}

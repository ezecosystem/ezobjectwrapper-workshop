<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KaliopEzobjectWorkshopBundle:Default:index.html.twig', array('name' => $name));
    }
}

<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction($locationId, $viewType, $layout = false, array $params = array())
    {
        $response =  $this->get( 'ezpublish.controller.content.view' )->viewLocation(
            $locationId,
            $viewType,
            $layout,
            $params
        );

        $response->setPublic();
        $response->setMaxAge(46200);//12h

        return $response;
    }
}

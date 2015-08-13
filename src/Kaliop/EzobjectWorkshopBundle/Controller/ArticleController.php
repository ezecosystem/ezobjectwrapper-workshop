<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction($locationId, $viewType, $layout = false, array $params = array())
    {

        $params['wrapper'] = $this->get('ezobject_wrapper.services.factory')->buildeZObjectWrapper($locationId);

        $response =  $this->get( 'ezpublish.controller.content.view' )->viewLocation(
            $locationId,
            $viewType,
            $layout,
            $params
        );

        $response->setPublic();

        return $response;
    }
}

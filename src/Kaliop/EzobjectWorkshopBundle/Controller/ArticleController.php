<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction($locationId, $viewType, $layout = false, array $params = array())
    {
        /**
         * @var Repository $repository
         */
        $repository = $this->get('ezpublish.api.repository');

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

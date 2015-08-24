<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{
    public function fullAction($locationId, $viewType ='line', $layout = false, array $params = array())
    {
        $placeLocation = $this->get('ezpublish.api.inner_repository')->getLocationService()->loadLocation($locationId);
        $placesChildren = $this->get('ezpublish.api.inner_repository')->getLocationService()->loadLocationChildren($placeLocation);

        $params['children'] = $placesChildren->locations;

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

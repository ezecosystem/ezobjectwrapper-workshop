<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FolderController extends Controller
{
    public function indexAction($locationId, $viewType, $layout = false, array $params = array())
    {
        /**
         * @var Repository $repository
         */
        $repository = $this->get('ezpublish.api.repository');


        $location = $repository->getLocationService()->loadLocation($locationId);
        $childrenLocationList = $repository->getLocationService()->loadLocationChildren($location);

        $children = array();
        foreach($childrenLocationList->locations as $childLocation)
        {
            $children[]=$this->get('ezobject_wrapper.services.factory')->buildeZObjectWrapper($childLocation->id);
        }

        $params['children']=$children;

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

<?php

namespace Kaliop\EzobjectWorkshopBundle\Controller;

use eZ\Publish\API\Repository\Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
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
            $content = $repository->getContentService()->loadContent($childLocation->contentId);
            $contentType = $repository->getContentTypeService()->loadContentType($content->contentInfo->contentTypeId);
            $children[]=array('identifier' => $contentType->identifier, 'content' => $content, 'location' => $childLocation);
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

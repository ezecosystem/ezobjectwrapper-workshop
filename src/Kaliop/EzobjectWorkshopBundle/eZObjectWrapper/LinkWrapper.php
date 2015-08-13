<?php

namespace Kaliop\EzobjectWorkshopBundle\eZObjectWrapper;


class LinkWrapper extends BaseWrapper{



    public function getUrl()
    {
       $url = $this->content()->getFieldValue('location');

        if($url == '')
        {
            $relationContentId = $this->content()->getFieldValue('internal_location');
            $destinationContent = $this->repository->getContentService()->loadContent($relationContentId);

            if($destinationContent->contentInfo->mainLocationId != null)
            {
                $location = $this->repository->getLocationService()->loadLocation($destinationContent->contentInfo->mainLocationId);
                $url = $this->container->get('ezpublish.urlalias_router')->generate($location);

            }

        }

        return $url;
    }

    public function openLinkInNewWindow()
    {
        return $this->content()->getFieldValue('open_in_new_window')->bool;
    }

}
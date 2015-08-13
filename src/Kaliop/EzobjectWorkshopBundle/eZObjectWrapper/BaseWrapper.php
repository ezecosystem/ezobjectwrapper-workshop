<?php

namespace Kaliop\EzobjectWorkshopBundle\eZObjectWrapper;

use eZObject\WrapperBundle\Core\eZObjectWrapper;

class BaseWrapper extends eZObjectWrapper{

    public function titleField()
    {
        return 'name';
    }

    public function getUrl()
    {
        return $this->container->get( 'ezpublish.urlalias_router' )->generate( $this->location() );
    }

    public function openLinkInNewWindow()
    {
        return false;
    }

}
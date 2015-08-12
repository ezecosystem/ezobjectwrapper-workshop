<?php

namespace Kaliop\EzobjectWorkshopBundle\eZObjectWrapper;

use eZObject\WrapperBundle\Core\eZObjectWrapper;

class BaseWrapper extends eZObjectWrapper{

    public function titleField()
    {
        return 'name';
    }

}
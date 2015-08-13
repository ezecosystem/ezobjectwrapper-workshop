<?php

namespace Kaliop\EzobjectWorkshopBundle\eZObjectWrapper;


class ArticleWrapper extends BaseWrapper {

    public function titleField()
    {
        return 'title';
    }

    public function getColorClass()
    {
        $colorValue = $this->content()->getFieldValue('color');
        $colorClass="text-primary";

        if(!empty($colorValue))
        {
            switch($colorValue->selection[0])
            {
                case "0":
                    $colorClass="text-primary";
                    break;

                case "1":
                    $colorClass="text-warning";
                    break;

                case "2":
                    $colorClass="text-danger";
                    break;
                case "3":
                    $colorClass="text-success";
                    break;
                case "4":
                    $colorClass="text-info";
                    break;

            }
        }
        return $colorClass;
    }

    public function imageField()
    {
        if(!$this->container->get('ezpublish.field_helper')->isFieldEmpty($this->content(),'image'))
        {
            return 'image';
        }
        elseif(!$this->container->get('ezpublish.field_helper')->isFieldEmpty($this->content(),'image2'))
        {
            return 'image2';
        }
        return null;
    }


}
<?php

namespace Training\UploaderImage\Model\ResourceModel\Image;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\UploaderImage\Model\Image;
use Training\UploaderImage\Model\ResourceModel\Image as ResourceModelImage;

class Collection extends AbstractCollection {
    protected function _construct()
    {
        $this->_init(Image::class, ResourceModelImage::class);
    }
}

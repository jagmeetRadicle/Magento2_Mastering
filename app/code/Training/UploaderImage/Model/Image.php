<?php

namespace Training\UploaderImage\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Training\UploaderImage\Api\Data\ImageInterface;
use Training\UploaderImage\Model\ResourceModel\Image as ResourceModelImage;

class Image extends AbstractModel implements ImageInterface, IdentityInterface {
    const CACHE_TAG = 'custom_upload_images';

    public function getIdentities()
    {
        return [
            self::CACHE_TAG . '_' . $this->getId(),
        ];
    }

    protected function _construct () {
        $this->_init(ResourceModelImage::class);
    }

    public function getPath()
    {
        return $this->getData(self::PATH);
    }

    public function setPath($value)
    {
        return $this->setData(self::PATH, $value);
    }
}

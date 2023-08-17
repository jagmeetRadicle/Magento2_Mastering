<?php

namespace Training\UploaderImage\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Image extends AbstractDb {
    protected function _construct () {
        return $this->_init('custom_upload_images', 'image_id');
    }
}

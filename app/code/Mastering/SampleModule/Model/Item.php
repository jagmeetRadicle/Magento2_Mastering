<?php

namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel{

    protected function _construct(){
        $this->_init(\Mastering\SampleModule\Model\ResourceModel\Item::class);
    }
    //no need to write getters and setters(magic methods) as it will be provided by dataobject class inherited by AbstractModel.
}

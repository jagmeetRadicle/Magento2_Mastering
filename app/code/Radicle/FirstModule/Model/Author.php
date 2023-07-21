<?php

namespace Radicle\FirstModule\Model;

use Magento\Framework\Model\AbstractModel;
use Radicle\FirstModule\Model\ResourceModel\Author as ResourceModel;

//Models are like a black box which provides a layer of abstraction on top of the resource models. The fetching, extraction, and manipulation of data occur through models. As a rule of thumb
//every entity we create (i.e. every table we create in our database) should have its own model class.
//we can call the setDataand getData functions on our model, to get or set the data of a model respectively.

class Author extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}

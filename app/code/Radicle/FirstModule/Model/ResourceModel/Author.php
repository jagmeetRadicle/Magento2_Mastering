<?php

namespace Radicle\FirstModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

//All of the actual database operations are executed by the resource model. Every model must have a resource model, since all of the methods of a resource model expects a model as its first parameter.

class Author extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('first_table', 'id');
    }
}

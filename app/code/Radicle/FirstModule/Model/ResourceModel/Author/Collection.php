<?php
namespace Radicle\FirstModule\Model\ResourceModel\Author;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Radicle\FirstModule\Model\Author as Model;
use Radicle\FirstModule\Model\ResourceModel\Author as ResourceModel;



/**
 * Collections are used when we want to fetch multiple rows from our table. Meaning collections are a group of models
 * Collections can be used when we want to:
    Fetch multiple rows from a table
    Join tables with our primary table
    Select specific columns
    Apply a WHERE clause to our query
    Use GROUP BY or ORDER BY in our query
*/
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}

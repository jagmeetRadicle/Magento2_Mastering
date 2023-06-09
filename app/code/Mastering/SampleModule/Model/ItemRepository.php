<?php
namespace Mastering\SampleModule\Model;
use Mastering\SampleModule\Api\ItemRepositoryInterface;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class ItemRepository implements ItemRepositoryInterface{

    private $collectionFactory;
    public $jsonFactory;

    public function __construct(CollectionFactory $collectionFactory,JsonFactory $jsonFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->jsonFactory = $jsonFactory;
    }

    public function getList()
    {
//        $resultJson = $this->jsonFactory->create();
//        $items = $this->collectionFactory->create()->getItems();
//        return $resultJson->setData($items);
        return $this->collectionFactory->create()->getItems();
    }
}

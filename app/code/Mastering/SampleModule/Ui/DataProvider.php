<?php
namespace Mastering\SampleModule\Ui;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class DataProvider extends AbstractDataProvider{
    public function __construct($name,
                                $primaryFieldName,
                                $requestFieldName,
                                CollectionFactory $collectionFactory,
                                array $meta = [],
                                array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

    }

    public function getData()
    {
        $result= [];
        foreach($this->collection->getItems() as $item){
           $result[$item->getId()]['general'] = $item->getData();
        }
        return $result;
    }
}

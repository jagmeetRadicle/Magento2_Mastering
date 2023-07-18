<?php
namespace Radicle\FirstModule\Ui;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Radicle\FirstModule\Model\ResourceModel\Author\CollectionFactory;

class DataProvider extends AbstractDataProvider{

    private $customerfactory;
    public function __construct($name,
                                $primaryFieldName,
                                $requestFieldName,
                                CollectionFactory $collectionFactory,
                                \Magento\Customer\Model\CustomerFactory $customerfactory,
                                array $meta = [],
                                array $data = [])
    {
        $this->collection = $collectionFactory->create();
        $this->customerfactory = $customerfactory;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

    }

    public function getData()
    {
        $customerModel = $this->customerfactory->create();
        $result= [];
        foreach($this->collection->getItems() as $item){
            $customer = $customerModel->load($item->getData("Customer Id"));
            $customerName =$customer->getName();
            $item->setData("customer_name",$customerName);
            $result[$item->getId()]= $item->getData();
        }
        return $result;
    }
}

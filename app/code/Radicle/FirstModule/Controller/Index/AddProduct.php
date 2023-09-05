<?php

namespace Radicle\FirstModule\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Filter\TruncateFilter\ResultFactory;

class AddProduct implements ActionInterface{
    private $jsonResultFactory;

    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
    ) {
        $this->jsonResultFactory = $jsonResultFactory;
    }


public function execute()
    {
        //Get Object Manager Instance
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $_product = $objectManager->create('Magento\Catalog\Model\Product');
        $_product->setName('Sample Product');
        $_product->setTypeId('simple');
        $_product->setAttributeSetId(4);
        $_product->setSku('sample-SKU');
        $_product->setWebsiteIds(array(1));
        $_product->setVisibility(4);
        $_product->setPrice(array(1));
        $_product->setImage('../../images/test.jpg');
        $_product->setSmallImage('../../images/test.jpg');
        $_product->setThumbnail('../../images/test.jpg');
        $_product->setStockData(array(
                'use_config_manage_stock' => 0, //'Use config settings' checkbox
                'manage_stock' => 1, //manage stock
                'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
                'max_sale_qty' => 2, //Maximum Qty Allowed in Shopping Cart
                'is_in_stock' => 1, //Stock Availability
                'qty' => 100 //qty
            )
        );

        $res = $_product->save();
        $data = ['message' => 'Product created successfully',"data" => $res->getId()];
        $result = $this->jsonResultFactory->create();
        $result->setData($data);
        return $result;
    }
}

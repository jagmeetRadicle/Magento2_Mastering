<?php

namespace Training\UploaderImage\Ui\Component\Form;

use Magento\Framework\Registry;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        Registry $registry,
        \Training\UploaderImage\Model\ResourceModel\Image\CollectionFactory $imageCollectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->registry = $registry;
        $this->collection = $imageCollectionFactory->create();
    }

    public function getData()
    {
        return [];
    }

}

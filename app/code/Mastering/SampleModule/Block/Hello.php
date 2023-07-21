<?php
namespace Mastering\SampleModule\Block;
use \Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\Main;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template{
    public $collectionFactory;
    public $main;

    public function __construct(Template\Context $context, CollectionFactory $collectionFactory,Main $main,array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        $this->main = $main;
        parent::__construct($context, $data);
    }

    public function getItems(){
        return $this->collectionFactory->create()->getItems();
    }
    public function getMain(): Main{
        return $this->main;
    }
}

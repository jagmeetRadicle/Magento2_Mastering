<?php

namespace Mastering\SampleModule\Controller\Index;
use \Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index implements ActionInterface{
    protected $_resultFactory;

    public function __construct(
        ResultFactory $resultFactory
    ){
        $this->_resultFactory = $resultFactory;
    }

    public function execute()
    {
//        $result = $this->_resultFactory->create(ResultFactory::TYPE_RAW);
//        $result->setContents("Hello UI Frontend side..");
//        return $result;
        //instead of result ,you can return a page as well by making factory of page class
        return $this->_resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}


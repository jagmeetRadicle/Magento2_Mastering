<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Index;
use \Magento\Framework\Controller\ResultFactory;
class Index extends \Magento\Backend\App\Action{

    public function execute()
    {
//        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
//        $result->setContents("Hello Admins");
//        return $result;



        return  $this->resultFactory->create(ResultFactory::TYPE_PAGE);
//        $pageFactory->getConfig()->getTitle()->prepend(__("Magento Admin"));
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Mastering_SampleModule::mastering");
    }
}

<?php

namespace Radicle\FirstModule\Controller\Adminhtml\Index;
use \Magento\Framework\Controller\ResultFactory;
class Index extends \Magento\Backend\App\Action{

    public function execute()
    {
        return  $this->resultFactory->create(ResultFactory::TYPE_PAGE);
//        $pageFactory->getConfig()->getTitle()->prepend(__("Magento Admin"));
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Radicle_FirstModule::radicle");
    }
}

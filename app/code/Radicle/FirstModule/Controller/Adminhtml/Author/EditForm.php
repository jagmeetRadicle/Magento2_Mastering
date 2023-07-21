<?php

namespace Radicle\FirstModule\Controller\Adminhtml\Author;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
class EditForm extends Action{


    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
//        $id = $this->getRequest()->getParams("id");
//        var_dump("Working");
//        var_dump($id);
//        die;
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Radicle_FirstModule::radicle");
    }

}

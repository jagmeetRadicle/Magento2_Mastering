<?php
namespace Radicle\FirstModule\Controller\Adminhtml\Author;

use Magento\Framework\Controller\ResultFactory;

class Form extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Radicle_FirstModule::radicle");
    }
}

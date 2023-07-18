<?php
namespace Radicle\FirstModule\Controller\Adminhtml\Author;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{
    /**
     * @var \Radicle\FirstModule\Model\AuthorFactory
     */
    protected $authorFactory;

    /**
     * Dependency Initilization
     *
     * @param Context $context
     * @param \Radice\FirstModule\Model\authorFactory $authorFactory
     */
    public function __construct(
        Context $context,
        \Radicle\FirstModule\Model\authorFactory $authorFactory
    ) {
        $this->authorFactory = $authorFactory;
        parent::__construct($context);
    }

    /**
     * Provides content
     *
     * @return Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $authorModel = $this->authorFactory->create();
            $authorModel->load($id);
            $authorModel->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the particular author succesfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('*/');
    }

    /**
     * Check Autherization
     *
     * @return boolean
     */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Radicle_FirstModule::delete');
    }
}

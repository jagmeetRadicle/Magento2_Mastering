<?php

namespace Training\UploaderImage\Controller\Adminhtml\Images;
use \Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action {

    public function execute()
    {
        \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Psr\Log\LoggerInterface::class)->debug('Controller function called');
//        echo "hello";
//        var_dump("Working");
//        die;
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Training_UploaderImage::images_uploader');
        $resultPage->getConfig()->getTitle()->prepend(__('Images'));
        return $resultPage;
    }
}

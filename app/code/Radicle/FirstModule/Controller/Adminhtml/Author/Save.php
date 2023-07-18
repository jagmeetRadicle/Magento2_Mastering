<?php
namespace Radicle\FirstModule\Controller\Adminhtml\Author;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use Radicle\FirstModule\Model\AuthorFactory;

class Save extends \Magento\Backend\App\Action
{

    protected $authorFactory;
    public function __construct(Context $context,AuthorFactory $authorFactory)
    {
        $this->authorFactory = $authorFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
//        $data = $this->getRequest()->getPost();
        $data = $this->getRequest()->getPostValue();

     if ($data)  {
            try {

                $authorModel = $this->authorFactory->create();
                $authorModel = $authorModel->load($data["id"]);
//                $authorModel->setData($data)->save();

                $authorModel->setAuthorName($data["author_name"]);
                $authorModel->setEmail($data["email"]);
                $authorModel->setDescription($data["description"]);
                $authorModel->setTimeOccured($data["time_occured"]);
                $authorModel->setStoreId($data["store_id"]);
//                $authorModel->setId(30);
                $authorModel->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));

            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $this->resultRedirectFactory->create()->setPath("*/*/");
            }

            return $this->resultRedirectFactory->create()->setPath("helloworld/index/index");
        }
    }
}

<?php
namespace Radicle\FirstModule\Controller\Author;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Radicle\FirstModule\Model\AuthorFactory;
use Radicle\FirstModule\Model\ResourceModel\Author as AuthorResource;

//specific work related action classes
class Add extends Action{

    private $author;
    private $pageFactory;

    private $customerModel;
    private $redirect;

    public function __construct(Context $context,AuthorFactory $author,\Magento\Framework\View\Result\PageFactory $pageFactory,\Magento\Customer\Model\Session $customer)
    {
        $this->author = $author;   //model(getters and setters method for accesing db data)
        $this->pageFactory = $pageFactory;
        $this->customerModel = $customer;
        parent::__construct($context);
    }

    public function getLogginedCustomerId()
    {
        $customer = $this->customerModel;
//        $customerName = $customer->getName();
        $customerId = $customer->getId();

        return $customerId;
    }

    public function execute()
    {
//        post data
        $data =(array)$this->getRequest()->getParams();
        $customerId = $this->getLogginedCustomerId();

        $this->redirect = $this->resultRedirectFactory->create();
        if(!$customerId){
            $this->redirect->setPath('customer/account/login');
            return $this->redirect;
        }

        if(count($data) > 0 ) {
            //customer data
            $data['Customer Id'] = $customerId;
            $authorModel = $this->author->create();
            $authorModel->setData($data);

            try {
                $authorModel->save();
                $this->messageManager->addSuccessMessage("Author saved successfully");
            } catch (\Exception $exception) {
                $this->messageManager->addErrorMessage("Error while saving Author ".$exception->getMessage());
            }
        }
        if(count($data) > 0){
            $this->redirect->setPath('helloworld/author/add');
            return $this->redirect;   //return response
        }else{
            $page = $this->pageFactory->create();
            return $page;
        }
    }
}


<?php
namespace Radicle\FirstModule\Controller\Author;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Radicle\FirstModule\Model\Author;
use Radicle\FirstModule\Model\ResourceModel\Author as AuthorResource;

//specific work related action classes
class Add extends Action{

    private $author;
    private $authorResource;
    private $pageFactory;

    private $customerModel;

    public function __construct(Context $context,Author $author,AuthorResource $authorResource, \Magento\Framework\View\Result\PageFactory $pageFactory,\Magento\Customer\Model\Session $customer)
    {
        parent::__construct($context);
        $this->author = $author;   //model(getters and setters method for accesing db data)
        $this->authorResource = $authorResource; //resourcemodel(for crud operations like save)
        $this->pageFactory = $pageFactory;
        $this->customerModel = $customer;
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
        $data = $this->getRequest()->getParams();

        if(count($data) > 0 ){
            //customer data
        $customerId = $this->getLogginedCustomerId();
        $data['Customer Id'] = $customerId;

            echo json_encode($data);
            echo "Data Saved Successfully";
        }

        $authorModel = $this->author;
        $authorModel->setData($data);

        try{
            $this->authorResource->save($authorModel);
            $this->messageManager->addSuccessMessage("Author saved successfully");
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage("Error while saving Author");
        }

        if(count($data) > 0){
            $redirect = $this->resultRedirectFactory->create();
            $redirect->setPath('helloworld');
            return $redirect;   //return response
        }else{
            $page = $this->pageFactory->create();
            return $page;
        }
    }
}


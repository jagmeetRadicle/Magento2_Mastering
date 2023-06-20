<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Mastering\SampleModule\Model\ItemFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $itemFactory;
    public function __construct(Context $context, ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue()['general'];

//        var_dump($data["created_at"]);
        $data["created_at"] = strtotime($data["created_at"]);
//        die;

        $model = $this->itemFactory->create();
        if(isset($data['id'])){
            try{
                $id = $data["id"];
                $model = $model->load($id);
                $model->setName($data["name"]);
                $model->setContent($data["content"]);
                $model->setCreatedAt($data["created_at"]);
//                $model->setData();
                $model->save();
            }catch(LocalizedException $e){
                $this->messageManager->addErrorMessage($e->getMessage());
                return $this->resultRedirectFactory->create()->setPath("*/*/");
            }
        }

        return $this->resultRedirectFactory->create()->setPath("mastering/index/index");
    }
}

<?php

namespace Training\LayoutExample\Controller\Layout;

use Magento\Framework\App\ActionInterface;

class Index implements ActionInterface{

    protected $pageFactory;
    public function __construct(\Magento\Framework\View\Result\PageFactory $pageFactory){
        $this->pageFactory = $pageFactory;
    }

    public function execute(){
        $page = $this->pageFactory->create();
        echo $page->getConfig()->getTitle()->get();
        $page->getConfig()->getTitle()->set("From Controller..");
        return $page;
    }
}

?>

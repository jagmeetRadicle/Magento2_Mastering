<?php
namespace Training\CustomWidget\Controller\Widget;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class index implements ActionInterface {

    protected $pageFactory;
    public function __construct(
        PageFactory $pageFactory
    ){
        $this->pageFactory = $pageFactory;
    }
    public function execute(){
        return $this->pageFactory->create();
    }
}

?>

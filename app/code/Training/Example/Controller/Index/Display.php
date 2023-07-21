<?php
namespace Training\Example\Controller\index;
use Magento\Framework\App\ActionInterface;
class Display implements ActionInterface {

    protected $pageFactory;
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ){
        $this->pageFactory = $pageFactory;
    }
    public function execute()
    {
//        echo "heelo";
//        die();
        return $this->pageFactory->create();
    }
}

?>

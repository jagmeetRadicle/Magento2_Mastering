<?php
namespace Radicle\FirstModule\Controller\Index;
use Magento\Framework\App\ActionInterface;
use Radicle\FirstModule\Helper\Data;

class Index implements ActionInterface {

    protected $pageFactory;
    public $helper;
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        Data $datahelper
    ){
        $this->pageFactory = $pageFactory;
        $this->helper = $datahelper;
    }
    public function execute()
    {
//        $this->helper->getDetails();
        return $this->pageFactory->create();
    }
}

?>

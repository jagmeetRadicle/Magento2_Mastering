<?php
/**
 * @var \Magento\Framework\Controller\Result\JsonFactory
 */
namespace Training\Example\Controller\index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ActionInterface;
class index implements ActionInterface {

    private $jsonResultFactory;
    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
    ){
        $this->jsonResultFactory = $jsonResultFactory;
    }
    public function execute()
    {
        $data = ['firstname'=>'jagmeet','lastname' => 'singh' ];
        $result = $this->jsonResultFactory ->create();
        $result->setData($data);
        return $result;
    }
}

?>

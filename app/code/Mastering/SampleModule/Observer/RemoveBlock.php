<?php
namespace Mastering\SampleModule\Observer;
class RemoveBlock implements \Magento\Framework\Event\ObserverInterface {

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $layout = $observer->getLayout();

        $block = $layout->getBlock("layout_block");
//        print_r(json_encode($block->getData()));
//        die;
        if($block){
            $layout->unsetElement("layout_block");
            $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/removeblock.log');
            $logger = new \Zend_Log();
            $logger->addWriter($writer);
            $logger->info('Remove block Event Triggered');
        }
    }
}

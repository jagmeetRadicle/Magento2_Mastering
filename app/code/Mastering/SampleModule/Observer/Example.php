<?php
namespace Mastering\SampleModule\Observer;

use Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;
class Example implements ObserverInterface{


    public function execute(Observer $observer)
    {
//        $this->logger->info("event triggered");
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('Event Triggered');
//        $logger->info(print_r($object->getData(), true));
    }
}

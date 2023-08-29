<?php

namespace Radicle\FirstModule\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomPrice implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer) {
        $item = $observer->getEvent()->getData('quote_item');

        // Get parent product if current product is child product
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );

        //Define your Custom price here
        $price = 100;

        //Set custom price
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        $item->getProduct()->setIsSuperMode(true);
    }
}

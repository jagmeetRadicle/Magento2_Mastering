<?php

namespace Radicle\FirstModule\Model;

class ChangeSuccessMessage{

    protected $checkoutSession;
    protected $messageManager;
    public function __construct(
        \Magento\Checkout\Model\Session  $checkoutSession,
        \Magento\Framework\Message\ManagerInterface $messageManager,
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->messageManager = $messageManager;
    }

    public function afterExecute(\Magento\Checkout\Controller\Cart\Add $subject,$result){
//        $items = $this->checkoutSession->getQuote()->getAllItems();
//        $max = 0;
//        $lastItem = null;
//        foreach ($items as $item){
//            if ($item->getId() > $max) {
//                $max = $item->getId();
//                $lastItem = $item;
//            }
//        }
//        if ($lastItem){
//            $lastAddedProductName = $lastItem->getName();
//        }
//        \Magento\Framework\App\ObjectManager::getInstance()
//            ->get(\Psr\Log\LoggerInterface::class)->debug('observer function called------> '.$lastItem);

        if($this->messageManager->getMessages()->getLastAddedMessage()->getIdentifier("addCartSuccessMessage") === "addCartSuccessMessage"){
            $this->messageManager->getMessages()->deleteMessageByIdentifier("addCartSuccessMessage");
        }
        return $result;
    }

}

<?php

namespace Radicle\FirstModule\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomBackendAuth implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer) {
        $user = $observer->getEvent();
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom_backend_auth.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);

        if($user->getData("name") === "backend_auth_user_login_success"){
            $logger->info($user->getUser("username")." login successfully");
        }else if($user->getData("name") === "backend_auth_user_login_failed") {
            $logger->info($user->getUserName()." login failed");
        }
        return $this;

    }
}

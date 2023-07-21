<?php

namespace Radicle\FirstModule\Model;

class SetDefaultFormValue{

    public function afterGetFormData(\Magento\Customer\Block\Form\Register $subject,$result){
        if(count($result->getData()) > 0){
            print_r($result->getData());
            die;
        }else {
            $result->setFirstname("Ms valia");
            $result->setLastname("Kumar");
            $result->setEmail("ms@gmail.com");
            return $result ;
        }
    }
}

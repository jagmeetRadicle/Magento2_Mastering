<?php

namespace Radicle\FirstModule\Plugin;

class Product{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result){
        return "Plugin triggered for :- ".$result;
    }
}

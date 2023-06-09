<?php
namespace Mastering\SampleModule\Model;
use Magento\Framework\DataObject;

class MethodInjection{

    public function getName(DataObject $dataObject){
         return $dataObject->getData('name');
    }
}

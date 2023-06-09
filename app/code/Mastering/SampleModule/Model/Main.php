<?php

namespace Mastering\SampleModule\Model;
use Magento\Framework\DataObject;
use Mastering\SampleModule\Model\NonInjectableFactory;
use Mastering\SampleModule\Model\Plugins\PageName;
use Mastering\SampleModule\Model\VirtualType\DefaultName;

class Main {

    public array $data;
    public $injectable;
    public $nonInjectableFactory;
    public $util;
    public $heavyOperation;
    public $defaultName;
    public $pageName;
    public MethodInjection $methodInjection;
    public function __construct(InjectableInterface $injectable,NonInjectableFactory $nonInjectable,AbstractUtil $util,HeavyOperation $heavyOperation,DefaultName $defaultName,MethodInjection $methodInjection,PageName $pageName,array $data = [])
    {
        $this->data = $data;
        $this->injectable = $injectable;
        $this->nonInjectableFactory = $nonInjectable;
        $this->util = $util;
        $this->heavyOperation = $heavyOperation;
        $this->defaultName = $defaultName;
        $this->methodInjection = $methodInjection;
        $this->pageName = $pageName;
    }

    public function getId() : string{
        return "Main Id:- " . $this->data['id'];
    }

    public function getInjectable():Injectable{
        return $this->injectable;
    }
    public function getNonInjectable() : NonInjectable{
        return $this->nonInjectableFactory->create();
    }
    public function getUtil(){
        return $this->util;
    }

    public function getHeavyOperation():HeavyOperation{
        return $this->heavyOperation;
    }

    public function getDefaultName():DefaultName{
        return $this->defaultName;
    }

    public function getMethodInjection(): string{
        $dataObject = new DataObject(['name' => "Method Injection Worked"]);
        return $this->methodInjection->getName($dataObject);    //no automatic method injection
    }

    public function getPageName():PageName{
        $this->pageName->setName("HOMEPAGE!!!!!!!!!!!");
        return $this->pageName;
    }
}

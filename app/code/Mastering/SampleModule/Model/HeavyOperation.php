<?php
namespace Mastering\SampleModule\Model;
class HeavyOperation{
    public $name;
    public function __construct()
    {
        $this->init();
    }
    public function init(){
        $this->name = "class heavy operation done"; //doing some heavy task like database connectionn and fetching large data .
    }

    public function getName(){
        return $this->name;
    }

}

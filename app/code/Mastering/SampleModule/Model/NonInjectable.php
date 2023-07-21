<?php
namespace Mastering\SampleModule\Model;
class NonInjectable{
    public function __construct()
    {
    }

    public function getId(){
        return "Non_Injectable_ID : 231123444";
    }
}

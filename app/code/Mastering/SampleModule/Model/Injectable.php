<?php
namespace Mastering\SampleModule\Model;
class Injectable implements InjectableInterface {
    public function __construct()
    {
    }

    public function getId():string{
        return "Injectable Id:- 3343453453";
    }
}

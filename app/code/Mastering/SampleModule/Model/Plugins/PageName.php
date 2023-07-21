<?php
namespace Mastering\SampleModule\Model\Plugins;
use Mastering\SampleModule\Model\Plugins\PageInterface;
class PageName implements PageInterface {

    protected $name;
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

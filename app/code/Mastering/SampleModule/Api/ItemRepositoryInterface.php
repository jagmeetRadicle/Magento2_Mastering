<?php
namespace Mastering\SampleModule\Api;

interface ItemRepositoryInterface{

    /**
     * @return \Mastering\SampleModule\Api\Data\ItemInterface[]
     */
    //basically items ka array return krega but item ke abstraction rakhne ke liye iteminterfaces return krenge but di.xml mein prefernce mention kri hai toh item object hi milega.
    public function getList();
}

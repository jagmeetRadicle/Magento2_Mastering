<?php
namespace Mastering\SampleModule\Cron;
use Mastering\SampleModule\Model\ItemFactory;
use Mastering\SampleModule\Model\Config;

class AddItem {
    public $itemFactory;
    public $config;

    public function __construct(ItemFactory $itemFactory,Config $config){
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    public function execute(){

        if($this->config->isEnabled()){     //when admin enable field set present in admin panel(backend) is enabled then this cron job will schedule.
            echo "Cron Job called";
            $this->itemFactory->create()
                ->setName("Item 15")
                ->setContent("Best Cost product")
                ->save();
        }

    }
}

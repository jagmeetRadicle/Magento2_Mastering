<?php
namespace Mastering\SampleModule\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->insert(
            $setup->getTable("mastering_sample_item"),
            ['name' => "Item 1",'content' => "Good Item content."]
        );
        $setup->getConnection()->insert(
            $setup->getTable("mastering_sample_item"),
            ['name' => "Item 2",'content' => "Bad Item content."]
        );

        $setup->getConnection()->insert(
            $setup->getTable("mastering_sample_item"),
            ['name' => "Item 3",'content' => "Nice Item content."]
        );

        $setup->getConnection()->insert(
            $setup->getTable("mastering_sample_item"),
            ['name' => "Item 4",'content' => "Excellent Item content."]
        );

        $setup->endSetup();

    }
}

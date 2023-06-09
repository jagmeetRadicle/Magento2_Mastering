<?php
use \Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface{

    public function upgrade(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();
            \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Psr\Log\LoggerInterface::class)->debug('observer function called');
            $setup->getConnection()->update(
                $setup->getTable("mastering_sample_data"),
                ["price"  => 23.34],
                $setup->getConnection()->quoteInto('id = ?',2)
            );

        $setup->endSetup();
    }
}

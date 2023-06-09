<?php

use  \Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface{
    //getConnection returns adapterInterface refernce variable where all db related fns are mentioned.

    public function upgrade(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();
            \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Psr\Log\LoggerInterface::class)->debug('observer function called');
            $setup->getConnection()->addColumn(
                $setup->getTable("mastering_sample_item"),
                'price',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                    'nullable' => true,
                    'comment' => 'price',
                    'before' => 'created_at'
                ]
            );



        $setup->endSetup();
    }
}

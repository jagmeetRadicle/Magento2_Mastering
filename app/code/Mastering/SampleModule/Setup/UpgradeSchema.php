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

            //sales_order_grid table new coloumn add.
            if(version_compare($context->getVersion(),"1.0.5","<")){
                $setup->getConnection()->addColumn(
                    $setup->getTable("sales_order_grid"),
                    "base_tax_amount",
                    [
                        "type" => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                        "comment" => "Base Tax Amount"
                    ]
                );
            }

        $setup->endSetup();
    }
}

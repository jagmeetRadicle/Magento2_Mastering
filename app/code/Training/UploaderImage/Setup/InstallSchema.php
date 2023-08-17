<?php

namespace Training\UploaderImage\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $imagesTableName = $setup->getTable('custom_upload_images');
        if (!$setup->getConnection()->isTableExists($imagesTableName)) {
            $imagesTable = $setup->getConnection()->newTable($imagesTableName)
                ->addColumn(
                    'image_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        Table::OPTION_IDENTITY => true,
                        Table::OPTION_PRIMARY => true,
                        Table::OPTION_UNSIGNED => true,
                        Table::OPTION_NULLABLE => false,
                    ],
                    'Image Id'
                )
                ->addColumn(
                    'path',
                    Table::TYPE_TEXT,
                    255,
                    [
                        Table::OPTION_NULLABLE => false
                    ],
                    'Image Path'
                );

            $setup->getConnection()->createTable($imagesTable);
        }

        $setup->endSetup();
    }
}

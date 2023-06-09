<?php
namespace Mastering\SampleModule\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use function Sodium\increment;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable($installer->getTable('mastering_sample_item'))
            ->addColumn('id',\Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                'Item Id')
            ->addColumn('name',\Magento\Framework\Db\Ddl\Table::TYPE_TEXT,255,
                ['nullable' => false],
                'Item Title')
            ->addColumn('content',\Magento\Framework\Db\Ddl\Table::TYPE_TEXT,'2M',
                [],
                'Item Content')
            ->addColumn('created_at',\Magento\Framework\Db\Ddl\Table::TYPE_TIMESTAMP,null,
                ['nullable'=>false,'default'=>\Magento\Framework\Db\Ddl\Table::TIMESTAMP_INIT],
                'Created At');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}

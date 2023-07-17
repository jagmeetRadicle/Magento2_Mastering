<?php

namespace Radicle\FirstModule\Setup\Patch\Schema;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\DB\Ddl\Table;

class AddColumn implements SchemaPatchInterface{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup){
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies()
    {
        // TODO: Implement getAliases() method.
        return [];
    }

    public function getAliases()
    {
        // TODO: Implement getAliases() method.
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        //write your logic
        $this->moduleDataSetup->getConnection()->addColumn(
            $this->moduleDataSetup->getTable("first_table"),"Customer Id",
            [
                "type" => Table::TYPE_INTEGER ,
                "nullable" => "false",
                "comment" => "Customer Id"
            ]
        );

        $this->moduleDataSetup->endSetup();
    }
}

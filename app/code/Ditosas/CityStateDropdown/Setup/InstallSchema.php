<?php

namespace Ditosas\CityStateDropdown\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
    {

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable( 'directory_country_region_city' )
        );

        $table->addColumn('city_id',Table::TYPE_INTEGER,null,[ 'identity' => true, 'nullable' => false, 'primary' => true ]);
        $table->addColumn('region_id',Table::TYPE_INTEGER,null,[ 'nullable' => false]);
        $table->addColumn('default_name',Table::TYPE_TEXT,null,[ 'nullable' => false]);
        $table->addColumn('capital_city',Table::TYPE_INTEGER,null,[ 'nullable' => false]);

        $installer->getConnection()->createTable( $table );

        $installer->endSetup();
    }
}
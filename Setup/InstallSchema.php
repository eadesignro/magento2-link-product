<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagePal\LinkProduct\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use MagePal\LinkProduct\Ui\DataProvider\Product\Form\Modifier\Accessory;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()
            ->update(
                $setup->getTable('catalog_product_link_type'),
                ['code' => Accessory::DATA_SCOPE_ACCESSORY],
                $setup->getConnection()->quoteInto('link_type_id=?', 6)
            );

        $setup->endSetup();
    }
}

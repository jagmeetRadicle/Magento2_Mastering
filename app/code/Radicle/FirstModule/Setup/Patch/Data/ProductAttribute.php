<?php
namespace Radicle\FirstModule\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\Product;

/**
 * Class ProductAttribute for Create Custom product Attribute using Data Patch.
 */
class ProductAttribute implements DataPatchInterface {

    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply() {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(Product::ENTITY, 'custom_text_attribute',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Custom Text Attribute',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'custom_datetime_attribute',
            [
                'label' => 'Custom Date Time Attribute',
                'type' => 'datetime',
                'input' => 'date',
                'class' => 'validate-date',
                'backend' => '',
                'frontend' => 'Magento\Eav\Model\Entity\Attribute\Frontend\Datetime',
                'required' => false,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'user_defined' => true,
                'default' => '',
                'searchable' => true,
                'filterable' => true,
                'filterable_in_search' => true,
                'visible_in_advanced_search' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'custom_select_attribute',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Custom Select Attribute',
                'input' => 'select',
                'class' => '',
                'source' => 'Radicle\FirstModule\Model\Config\Source\CustomAttributeOptions',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->addAttribute(Product::ENTITY, "custom_price_attribute", [
            'type'          => 'decimal',
            'backend'       => 'Magento\Catalog\Model\Product\Attribute\Backend\Price',
            'label'         => 'Custom Price Attribute',
            'input'         => 'price',
            'required'      => false,
            'global'        => ScopedAttributeInterface::SCOPE_WEBSITE,
            'group'         => 'General',
            'visible_on_front' => true,
        ]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'custom_cms_attribute',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Custom Cms Attribute',
                'input' => 'select',
                'class' => '',
                'source' => 'Radicle\FirstModule\Model\Config\Source\CustomCmsAttributeOptions',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies() {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases() {
        return [];
    }
    public static function getVersion()
    {
        return '2.4.3';
    }
}

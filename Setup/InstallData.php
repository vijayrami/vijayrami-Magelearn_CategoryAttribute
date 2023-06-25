<?php
namespace Magelearn\CategoryAttribute\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Backend\Datetime;
use Magento\Eav\Model\Entity\Attribute\Frontend\Datetime as DatetimeFrontend;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory.
     *
     * @var EavSetupFactory
     */
    private $_eavSetupFactory;
    
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    
    /**
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;
    
    /**
     * Init.
     *
     * @param EavSetupFactory $eavSetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CategorySetupFactory     $categorySetupFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory
    ) {
        $this->_eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->categorySetupFactory = $categorySetupFactory;
    }
    
    /**
     * {@inheritdoc}visible
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
        ) {
            /** @var EavSetup $eavSetup */
            $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);
            $setup = $this->categorySetupFactory->create(['setup' => $setup]);
            $setup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY, 
                'listing_product_box_flag_font_color', [
                    'type' => 'text',
                    'label' => 'Listing Product Box Flag Font Color',
                    'input' => 'text',
                    'is_user_defined' => true,
                    'visible' =>  true,
                    'required' => false,
                    'sort_order' => 9,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'Cateory Attribute Management'
                ]
            );
            $setup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'listing_product_box_flag_date', [
                    'type' => 'datetime',
                    'backend' => Datetime::class,
                    'frontend' => DatetimeFrontend::class,
                    'label' => 'Listing Product Box Flag Date',
                    'input' => 'date',
                    'required' => false,
                    'global' => ScopedAttributeInterface::SCOPE_STORE,
                    'is_user_defined' => true,
                    'sort_order' => 10,
                    'visible' => true,
                    'group' => 'Cateory Attribute Management',
                ]
            );
            $setup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'listing_menu_icon', [
                    'type' => 'varchar',
                    'label' => 'Listing Menu Icon',
                    'input' => 'image',
                    'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
                    'visible' =>  true,
                    'required' => false,
                    'sort_order' => 11,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'Cateory Attribute Management'
                ]
            );
            $setup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_menu_custom_filter', [
                    'type' => 'text',
                    'label' => 'Category Filter/label',
                    'input' => 'multiselect',
                    'source' => 'Magelearn\CategoryAttribute\Model\Category\Attribute\Source\Filter',
                    'backend' => 'Magelearn\CategoryAttribute\Model\Category\Attribute\Backend\Filter',
                    'visible' =>  true,
                    'required' => false,
                    'sort_order' => 12,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'Cateory Attribute Management',
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => true,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true
                ]
            );
            $setup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'menu_top_block', [
                    'type' => 'text',
                    'label' => 'Top Block',
                    'input' => 'textarea',
                    'required' => false,
                    'sort_order' => 13,
                    'wysiwyg_enabled' => true,
                    'is_html_allowed_on_front' => true,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'Cateory Attribute Management'
                ]
            );
            $setup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_menu_type', [
                    'type' => 'text',
                    'label' => 'Menu type',
                    'input' => 'select',
                    'source' => 'Magelearn\CategoryAttribute\Model\Category\Attribute\Source\Menu',
                    'visible' =>  true,
                    'required' => false,
                    'sort_order' => 14,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'Cateory Attribute Management',
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => true,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true
                ]
            );
    }
}
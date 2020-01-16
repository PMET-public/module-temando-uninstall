<?php
/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */
namespace MagentoEse\UninstallCleanup\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\SchemaSetupInterface;

use Magento\Catalog\Model\Product;

class UninstallAmastyBlog implements DataPatchInterface{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /** @var SchemaSetupInterface  */
    private $setup;

    /**
     * Uninstall constructor.
     * @param EavSetupFactory $eavSetupFactory
     * @param SchemaSetupInterface $setup
     */
    public function __construct(EavSetupFactory $eavSetupFactory, SchemaSetupInterface $setup)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->setup = $setup;
    }


    public function apply()
    {
        /** @var \Magento\Framework\Module\Setup $uninstaller */
        $uninstaller = $this->setup;

        $defaultConnection = $uninstaller->getConnection(ResourceConnection::DEFAULT_CONNECTION);
       // $checkoutConnection = $uninstaller->getConnection(SetupSchema::CHECKOUT_CONNECTION_NAME);
        //$salesConnection = $uninstaller->getConnection(SetupSchema::SALES_CONNECTION_NAME);

        $defaultConnection->dropTable('amasty_blog_post_helpful');
        $defaultConnection->dropTable('amasty_blog_author');
        $defaultConnection->dropTable('amasty_blog_views');
        $defaultConnection->dropTable('amasty_blog_tags');
        $defaultConnection->dropTable('amasty_blog_posts_tag');
        $defaultConnection->dropTable('amasty_blog_posts_store');
        $defaultConnection->dropTable('amasty_blog_posts_category');

        $defaultConnection->dropTable('amasty_blog_categories_store');
        $defaultConnection->dropTable('amasty_blog_categories');
        $defaultConnection->dropTable('amasty_blog_comments');
        $defaultConnection->dropTable('amasty_blog_posts');

    }

    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}

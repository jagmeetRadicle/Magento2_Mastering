<?php
namespace Radicle\FirstModule\Block;
use Magento\Framework\View\Element\Template;

//frontend related logics and interacting with db to view data into frontend.
class Cms extends Template{
    protected $_registry;
    public function __construct(\Magento\Backend\Block\Template\Context $context,\Magento\Framework\Registry $registry,array $data = [])
    {
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

//    public function getCurrentCategory()
//    {
//        return $this->_registry->registry('current_category');
//    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
//        die;
//        return;
    }

}

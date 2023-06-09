<?php
namespace Training\CustomWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Samplewidget extends Template implements BlockInterface{
    protected $_template = "widget/samplewidget.phtml";
}

?>

<?php
namespace Training\Example\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

    public function test()
    {
//        echo("nhi cahl rha");
//        die();
        return ("WORKING|||||||");
    }
}

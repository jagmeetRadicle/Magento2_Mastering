<?php
namespace Radicle\FirstModule\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class CustomCmsAttributeOptions extends AbstractSource
{
    /**
     * Get all options
     *
     * @return array
     */

    private $blockFactory;
    public function __construct(\Magento\Cms\Model\BlockFactory $blockFactory){
        $this->blockFactory = $blockFactory;
    }

    public function getAllOptions()
    {
        $i = 0;
        $block = $this->blockFactory->create()->getCollection();
        foreach ($block as $b) {
            $this->_options[$i] = ['label' => __($b["title"]), 'value' => $b["identifier"]];
            $i++;
        }
        return $this->_options;
    }
}

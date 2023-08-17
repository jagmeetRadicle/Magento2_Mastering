<?php

namespace Training\UploaderImage\Block\Adminhtml\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class UploadButton implements ButtonProviderInterface {
    public function getButtonData()
    {
        return [
            'label' => __('Upload'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}

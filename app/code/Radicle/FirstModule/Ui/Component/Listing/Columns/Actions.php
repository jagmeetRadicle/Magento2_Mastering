<?php

namespace Radicle\FirstModule\Ui\Component\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

/**
 * Class Actions
 */
class Actions extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */

    protected $urlBuilder;
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['id'])) {
                    $viewUrlPath = $this->getData('config/viewUrlPath');
                    $urlEntityParamName = $this->getData('config/urlEntityParamName');
                    $item[$this->getData('name')] = [
                        'view' => [
                            'href' => $this->urlBuilder->getUrl(
                                $viewUrlPath,
                                [
                                    $urlEntityParamName => $item['id'],
                                ]
                            ),
                            'label' => __('Delete'),
                        ],[
                            'href' => $this->urlBuilder->getUrl(
                                $viewUrlPath,
                                [
                                    $urlEntityParamName => $item['id'],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                    ];
                }
            }
        }
        return $dataSource;
    }









//    public function prepareDataSource(array $dataSource)
//    {
//        if (isset($dataSource['data']['items'])) {
//            foreach ($dataSource['data']['items'] as & $item) {
//                // here we can also use the data from $item to configure some parameters of an action URL
//                $id = $item["id"];
//                $item[$this->getData('name')] = [
//                    'edit' => [
//                        'href' => 'edit/'.$id,
//                        'label' => __('Edit')
//                    ],
//                    'delete' => [
//                        'href' => '*/helloworld/author/delete/'.$id,
//                        'label' => __('Delete')
//                    ],
//                ];
//            }
//        }
//        return $dataSource;
//    }
}
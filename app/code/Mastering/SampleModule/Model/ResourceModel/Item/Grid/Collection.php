<?php

namespace Mastering\SampleModule\Model\ResourceModel\Item\Grid;
class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult{

    public function __construct(\Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
                                \Psr\Log\LoggerInterface $logger,
                                \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
                                \Magento\Framework\Event\ManagerInterface $eventManager,
                                $mainTable = "mastering_sample_item",
                                $resourceModel = "Mastering\SampleModule\Model\ResourceModel\Item",
                                )
    {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }
}

<?php

namespace Radicle\FirstModule\Model\ResourceModel\Author\Grid;

class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult{
    public function __construct(\Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory, \Psr\Log\LoggerInterface $logger,
                                \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
                                \Magento\Framework\Event\ManagerInterface $eventManager,
                                $mainTable = "first_table",
                                $resourceModel ="Radicle\FirstModule\Model\ResourceModel\Author" )
    {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }
}

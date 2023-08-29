<?php
namespace Radicle\FirstModule\Block;
use Magento\Framework\View\Element\Template;
use Radicle\FirstModule\Model\ResourceModel\Author\Collection;

//frontend related logics and interacting with db to view data into frontend.
class Hello extends Template{

    private $collection;
    public function __construct(Template\Context $context, Collection $collection,array $data = [])
    {
        parent::__construct($context, $data);
        $this->collection = $collection;
    }

    public function getAllAuthors(){
        return $this->collection;
    }

    public function getAddAuthorPostUrl() {
        return $this->getUrl('helloworld/author/add');
    }

    public function getCacheLifetime()
    {
        return null;
    }
}

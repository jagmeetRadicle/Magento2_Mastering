<?php
namespace Radicle\FirstModule\Model;
use Radicle\FirstModule\Api\AuthorRepositoryInterface;
use Radicle\FirstModule\Model\ResourceModel\Author\CollectionFactory;
use Radicle\FirstModule\Model\Author;
use Magento\Framework\Controller\Result\JsonFactory;

class AuthorRepository implements AuthorRepositoryInterface{

    private $collectionFactory;
    public $jsonFactory;
    public $authorModel;

    public function __construct(CollectionFactory $collectionFactory,JsonFactory $jsonFactory,Author $authorModel)
    {
        $this->collectionFactory = $collectionFactory;
        $this->jsonFactory = $jsonFactory;
        $this->authorModel = $authorModel;
    }

    public function getList()
    {
//        $resultJson = $this->jsonFactory->create();
//        $items = $this->collectionFactory->create()->getItems();
//        return $resultJson->setData($items);
        return $this->collectionFactory->create()->getItems();
    }

    public function setList(string $name, string $email, string $description, int $id, int $cid)
    {

        $res = [$name,$email,$description,$id,$cid];

        $this->authorModel->setAuthorName($name);
        $this->authorModel->setEmail($email);
        $this->authorModel->setDescription($description);
        $this->authorModel->setStoreId($id);
        $this->authorModel->setCustomerId($cid);
        $this->authorModel->save();
        $resultJson = $this->jsonFactory->create();
//        \Magento\Framework\App\ObjectManager::getInstance()
//            ->get(\Psr\Log\LoggerInterface::class)->debug('setList  function called -> ');

        return [
            "message" => "success",
            "data" => $res
        ];
    }
}

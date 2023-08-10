<?php
namespace Radicle\FirstModule\Api;

use Magento\Framework\Controller\Result\JsonFactory;

interface AuthorRepositoryInterface{

    /**
     * @return \Radicle\FirstModule\Api\Data\AuthorInterface[]
     */
    //basically authors ka array return krega but author model ke abstraction rakhne ke liye iteminterfaces return krenge but di.xml mein prefernce mention kri hai toh author object hi milega.
    public function getList();

    /**
     * @param String $name
     * @param String $email
     * @param String $description
     * @param int $id
     * @param int $cid
     * @return mixed
     */
    public function setList(String $name,String $email,String $description,int $id,int $cid);
}

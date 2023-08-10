<?php

namespace Radicle\FirstModule\Api\Data;

//layer of abstraction for data availabel for public as webapi (directly db ya model access nhi krva skte).
interface AuthorInterface {
//    ============================================getters for api
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @return string|null
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return int
     */
    public function getStoreId();

    /**
     * @return timestamp
     */
    public function getTimeOccured();

    /**
     * @return int
     */
    public function getCustomerId();


//======================================================== Setters for Api
    /**
     * @param String $name
     * @return null
     */
    public function setAuthorName(String $name);

    /**
     * @param String $email
     * @return mixed
     */
    public function setEmail(String $email);

    /**
     * @param String $description
     * @return mixed
     */
    public function setDescription(String $description);

    /**
     * @param int $id
     * @return mixed
     */
    public function  setStoreId(int $id);

    /**
     * @param int $id
     * @return null
     *
     */
    public function setCustomerId(int $cid);
}

<?php

namespace Mastering\SampleModule\Api\Data;

//layer of abstraction for data availabel for public as webapi (directly db ya model access nhi krva skte).
interface ItemInterface {
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string|null
     */
    public function getContent();

    /**
     * @return timestamp
     */
    public function getCreatedAt();
}

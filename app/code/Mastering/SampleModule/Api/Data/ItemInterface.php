<?php

namespace Mastering\SampleModule\Api\Data;

//layer of abstraction for data availabel for public as webapi (directly db ya model access nhi krva skte).
use phpseclib3\File\ASN1\Maps\Time;

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
     * @return mixed
     */
    public function getCreatedAt();
}

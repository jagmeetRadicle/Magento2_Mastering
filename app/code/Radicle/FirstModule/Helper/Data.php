<?php

namespace Radicle\FirstModule\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\HTTP\Client\Curl;

class Data extends AbstractHelper{

    public $_curl;

    /**
     * @param Curl $curl
     */
    public function __construct(Curl $curl){
        $this->_curl = $curl;
    }

    public function getDetails(){
        $url = "http://demo.magento2.com/rest/V1/radicle";
        // get method
        $this->_curl->get($url);
        // output of curl request
        $response=$this->_curl->getBody();
        return $response;
    }
}

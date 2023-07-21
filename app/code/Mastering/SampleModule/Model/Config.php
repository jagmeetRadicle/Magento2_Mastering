<?php
namespace Mastering\SampleModule\Model;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config {
    public $config;
    //paths to my field set present in admin (backend)
    const XML_PATH_ENABLED = "mastering/general/enabled";
    const XML_PATH_CRON_EXPRESSION = "mastering/general/cron_expression";

    //ScopeConfigInterface :- to get system store configuration values by scope level on store or website, you will be required to use ScopeConfigInterface with getValue() method.
    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    public function isEnabled(){
            return $this->config->getValue(self::XML_PATH_ENABLED);
    }
}

<?php
namespace Mastering\SampleModule\Model\Plugins;
class PagePlugin {

    //use after interceptor for getters.
    public function afterGetName(PageName $subject,$result){
        return $result . " --After Page Plugin Invoked-- ";
    }

    //use before interceptor inorder to change argument values
    public function beforeSetName(PageName $subject,$name){
        $name = " Good Homepage!! ";
        return " Before Page Plugin called " . $name;
    }

    //use around interceptor to change argument values or manipulate result
    public function aroundGetName(PageName $subject,callable $proceed){
        return " --mid-- ".$proceed()." --mid-- ";
    }
}

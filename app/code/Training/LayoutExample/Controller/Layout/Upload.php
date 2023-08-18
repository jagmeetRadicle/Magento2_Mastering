<?php

namespace Training\LayoutExample\Controller\Layout;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

//specific work related action classes
class Upload extends Action{

    private $pageFactory;
    protected $_mediaDirectory;
    protected $_fileUploaderFactory;

    protected $_jsonFactory;

    public function __construct(Context $context,\Magento\Framework\View\Result\PageFactory $pageFactory,
                                \Magento\Framework\Filesystem $filesystem,
                                \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
                                \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->_mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->_jsonFactory = $jsonResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
//        $data = $this->getRequest()->getFiles();
//        print_r(count($data));
//        var_dump($_FILES);
//        die;
//        $resultRedirect = $this->resultRedirectFactory->create();
        try{
            $target = $this->_mediaDirectory->getAbsolutePath("uploaderImage/");
            $uploader = $this->_fileUploaderFactory->create(["fileId" => "cfile"]);
            $uploader->setAllowedExtensions(['jpg','jpeg', 'pdf', 'doc', 'png', 'zip', 'doc',"csv"]);
            $uploader->setAllowRenameFiles(true);
            $result = $uploader->save($target);
            if ($result['file']) {
                $this->messageManager->addSuccess(__('File has been successfully uploaded'));
            }
        }catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $res = $this->_jsonFactory->create();
        $res->setData(["message" => "success"]);
        return $res;
    }
}

?>

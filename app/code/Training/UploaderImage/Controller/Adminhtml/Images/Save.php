<?php

namespace Training\UploaderImage\Controller\Adminhtml\Images;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\Framework\Validation\ValidationException;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Save extends \Magento\Backend\App\Action {
    /**
     *
     * @var UploaderFactory
     */
    protected $uploaderFactory;

    /**
     * @var \Training\UploaderImage\Model\ImageFactory
     */
    protected $imageFactory;

    /**
     * @var Filesystem\Directory\WriteInterface
     */
    protected $mediaDirectory;

    public function __construct(
        Context $context,
        UploaderFactory $uploaderFactory,
        Filesystem $filesystem,
        \Training\UploaderImage\Model\ImageFactory $imageFactory
    )
    {
        parent::__construct($context);
        $this->uploaderFactory = $uploaderFactory;
        $this->imageFactory = $imageFactory;
        $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    }

    public function execute()
    {
        try {
            if ($this->getRequest()->getMethod() !== 'POST' || !$this->_formKeyValidator->validate($this->getRequest())) {
                throw new LocalizedException(__('Invalid Request'));
            }

            //validate image
            $fileUploader = null;
            $params = $this->getRequest()->getParams();
            try {
                $imageId = 'image';
                if (isset($params['image']) && count($params['image'])) {
                    $imageId = $params['image'][0];
                    if (!file_exists($imageId['tmp_name'])) {
                        $imageId['tmp_name'] = $imageId['path'] . '/' . $imageId['file'];
                    }
                }
                $fileUploader = $this->uploaderFactory->create(['fileId' => $imageId]);
                $fileUploader->setAllowedExtensions(['jpg', 'jpeg', 'png']);
                $fileUploader->setAllowRenameFiles(true);
                $fileUploader->setAllowCreateFolders(true);
                $fileUploader->validateFile();
                //upload image
                $info = $fileUploader->save($this->mediaDirectory->getAbsolutePath('imageUploader/images'));
                /** @var \Training\UploaderImage\Model\Image */
                $image = $this->imageFactory->create();
                $image->setPath($this->mediaDirectory->getRelativePath('imageUploader/images') . '/' . $info['file']);
                $image->save();
            } catch (ValidationException $e) {
                throw new LocalizedException(__('Image extension is not supported. Only extensions allowed are jpg, jpeg and png'));
            } catch (\Exception $e) {
                //if an except is thrown, no image has been uploaded
                throw new LocalizedException(__('Image is required'));
            }

            $this->messageManager->addSuccessMessage(__('Image uploaded successfully'));

            return $this->_redirect('*/*/index');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $this->_redirect('*/*/upload');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
            $this->messageManager->addErrorMessage(__('An error occurred, please try again later.'));
            return $this->_redirect('*/*/upload');
        }

    }
}
